/* global Autocomplete */

class Model {
  constructor() {
    // this.dataEndpoint = 'https://kittleproperties.com/wp-json/api/v1/kittle';
    this.dataEndpoint = 'http://127.0.0.1/wp/wp-json/api/v1/kittle';
    this.mediaResponse = this.getImageResponse();
    this.response = this.getResponse();
    this.Autocomplete = new Autocomplete($('#search_query'), this.getPropertyNames());
  }

  /**
   * Function that retreives the data from the endpoint and serves it to other
   * functions in a promise format. If the promise fails, no data is returned.
   * @returns {JSON}
   */
  async getResponse() {
    var response = await fetch(this.dataEndpoint, {
      cache: 'force-cache',
    }).then((response) => response.json());

    return response;
  }

  /**
   * The GetStateData returns the geometry data for the boundaries on the map
   * @returns {Array}
   */
  getStateData() {
    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.response.then((data) => data.STATEDATA);
    }
    // Object
    return this.response.STATEDATA;
  }

  /**
   * The GetPropertyData returns an array that contains the data for each property
   * @returns {Array}
   */
  getPropertyData() {
    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.response.then((data) => data.PROPERTIES);
    }
    // Object
    return this.response.PROPERTIES;
  }

  /**
   * The getPropertyNames array returns an array of the property names
   * @returns {Array}
   */
  getPropertyNames() {
    console.log(this.response);

    return this.response.then((data) => data.PROPERTIES.map(
      (propertyElement) => propertyElement.NAME,
    ));
  }

  /**
   * The getUniqueStates returns an array containing all of the states that contain at least one
   * property. If no properties exist, an empty array is returned.
   * @returns {Array}
   */
  getUniqueStates() {
    return this.response.then((data) => [...new Set(data.PROPERTIES.map(
      (propertyElement) => propertyElement.STATE,
    ))]);
  }

  /**
   * The getPropertiesFromState function returns the properties from a given state. If no
   * properties exist, an empty array is returned.
   * @param {String} state
   * @returns {Array}
   */
  getPropertiesFromState(state) {
    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.response.then(() => {
        if (state === '') {
          return this.response.PROPERTIES;
        }
        return this.response.PROPERTIES.filter(
          (propertyElement) => propertyElement.STATE === state,
        );
      });
    }
    // Object
    if (state === '') {
      return this.response.PROPERTIES;
    }
    return this.response.PROPERTIES.filter(
      (propertyElement) => propertyElement.STATE === state,
    );
  }

  async getImageResponse() {
    return fetch('http://127.0.0.1/wp/wp-json/wp/v2/media/?per_page=100').then((response) => response.json());
  }

  async getImageFromID(id) {

    let imageAttr = await this.mediaResponse.then((imageElement) => {
      imageElement.find(imageAttr => imageAttr.slug === id);
    })

    if (imageAttr === undefined) {
      return 'http://127.0.0.1/wp/wp-content/uploads/2021/07/kittle_placeholder.png'
    }

    return imageAttr.source_url;
  }

  /**
   f The FindPropertyNames returns all properties that match the given query
   * @param {String} stringQuery
   * @returns {Array}
   */
  findPropertyNames(stringQuery) {
    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.response.then(() => {
        if (stringQuery === '') {
          return this.response.PROPERTIES;
        }

        return this.response.PROPERTIES.filter(
          (propertyElement) => propertyElement.NAME.toLowerCase().includes(
            stringQuery.toLowerCase(),
          ),
        );
      });
    }
    // Object
    if (stringQuery === '') {
      return this.response.PROPERTIES;
    }
    return this.response.PROPERTIES.filter(
      (propertyElement) => propertyElement.NAME.toLowerCase().includes(
        stringQuery.toLowerCase(),
      ),
    );
  }

  findStatesDataFromPropertyData(propertyData) {

    const propertyStates = propertyData.map((property) => property.STATE);

    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.getStateData().then((stateData) => stateData.filter(
        (stateElement) => propertyStates.includes(stateElement.properties.STATE),
      ));
    }

    // Object
    return this.getStateData().filter(
      (stateElement) => propertyStates.includes(stateElement.properties.STATE),
    );
  }

  static findUniqueStatesFromPropertyData(propertyData) {
    return [...new Set(propertyData.map((propertyElement) => propertyElement.STATE))];
  }

  /**
   * The FindPropertiesByHousingType function will return an array of properties that contain the
   * matching housing type filter. If no matches, an empty array is returned.
   * @param {Object} HousingTypeFilter
   * @return {Array}
   */
  findPropertiesByHousingType(HousingTypeFilter) {
    return this.response.PROPERTIES.filter(
      (propertyElement) => HousingTypeFilter.indexOf(propertyElement.HOUSINGTYPES) !== -1,
    );
  }

  /**
   * The FindPropertiesByAffordability fucntion will return an array of properties that contain
   * the matching affordability type filter. If no matches, an empty array is returned.
   * @param {Object} AffordabilityFilter
   * @return {Array}
   */
  findPropertiesByAffordability(AffordabilityFilter) {
    return this.response.PROPERTIES.filter(
      (propertyElement) => AffordabilityFilter.indexOf(propertyElement.AFFORDABILITY) !== -1,
    );
  }

  /**
   * Finds the intersection between the filtered results of the HousingTypeFilter and the
   * AffordabilityFilter
   * @param {Object} AffordabilityFilter
   * @param {Object} HousingTypeFilter
   * @return {Array}
   */
  findPropertiesByFilters(HousingTypeFilter, AffordabilityFilter) {
    const housingFilteredResult = this.findPropertiesByHousingType(HousingTypeFilter);
    const affordabilityFilteredResult = this.findPropertiesByAffordability(AffordabilityFilter);

    return housingFilteredResult.filter(
      (propertyElement) => affordabilityFilteredResult.includes(propertyElement),
    );
  }

  /**
   * Description
   * @param {any} propertyData
   * @returns {any}
   */
  static sortByState(propertyData) {
    return propertyData.reduce((storage, item) => {
      const group = item.STATE;

      storage[group] = storage[group] || [];

      storage[group].push(item);

      return storage;
    }, {});
  }

  static unionFilter(searchData, stateData, checkboxData) {
    return searchData.filter(
      (searchFilteredProperties) => stateData.filter(
        (stateFilteredProperties) => checkboxData.includes(stateFilteredProperties),
      ).includes(searchFilteredProperties),
    );
  }

  /**
   * Function to show and hide the state dropdown menu
   * @author  Tyler
   */
  toggleDropdown(e) {
    // Prevent ghost click
    if (e.isTrusted) {
      this.DropdownContent.toggleClass('show');
      if (this.DropdownContent.height() > 0) {
        this.DropdownContent.animate({
          height: '0px',
        });
      } else {
        this.DropdownContent.animate({
          height: '50vh',
        });
      }
    }
  }

  /**
   * Function that closes the autocomplete results list
   * @returns {any}
   */
  CloseAutoComplete() {
    this.Autocomplete.closeAllLists();
  }
}