/* global Autocomplete */

class Model {
  constructor() {
    // this.dataEndpoint = 'https://kittleproperties.com/wp-json/api/v1/kittle';
    this.dataEndpoint = 'http://127.0.0.1/wp/wp-json/api/v1/kittle';
    this.response = this.getResponse();
    this.Autocomplete = new Autocomplete($('#search_query'), this.getPropertyNames());
  }

  /**
   * Function that retreives the data from the endpoint and serves it to other
   * functions in a promise format. If the promise fails, no data is returned.
   * @returns {JSON}
   */
  async getResponse() {
    return await fetch(this.dataEndpoint, {
      cache: 'force-cache',
    }).then((response) => response.json());
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
      return this.response.then((response) => {
        if (state === '') {
          return response.PROPERTIES;
        }
        return response.PROPERTIES.filter(
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

  /**
   * The FindPropertyNames returns all properties that match the given query
   * @param {String} stringQuery
   * @returns {Array}
   */
  findPropertyNames(stringQuery) {
    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.response.then((response) => {
        if (stringQuery === '') {
          return response.PROPERTIES;
        }

        return response.PROPERTIES.filter(
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
    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.response.then((response) => {
        return response.PROPERTIES.filter(
          (propertyElement) => HousingTypeFilter.indexOf(propertyElement.HOUSINGTYPES) !== -1,
        );
      })
    }

    // Object
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
    if (this.response != null && typeof (this.response.then) === 'function') {
      // Promise
      return this.response.then((response) => {
        return response.PROPERTIES.filter(
          (propertyElement) => AffordabilityFilter.indexOf(propertyElement.AFFORDABILITY) !== -1,
        );
      })
    }

    // Object
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
    let housingFilteredResult = this.findPropertiesByHousingType(HousingTypeFilter);
    let affordabilityFilteredResult = this.findPropertiesByAffordability(AffordabilityFilter);

    if (housingFilteredResult != null && affordabilityFilteredResult != null) {
      if (typeof (housingFilteredResult.then) === 'function' &&
        typeof (affordabilityFilteredResult.then) === 'function') {
        // Promises 
        return Promise.all([housingFilteredResult, affordabilityFilteredResult]).then(([housingResult, affordabilityResult]) => {
          return housingResult.filter(
            (propertyElement) => affordabilityResult.includes(propertyElement)
          );
        });

      }
    }

    // Objects
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

  /**
   * Performs an intersection filter on each of the filters only returning those properties
   * that contain all selected filters
   * @param {Array} searchData
   * @param {Array} stateData
   * @param {Array} checkboxData
   * @returns {Array}
   */
  static intersection(searchData, stateData, checkboxData) {
    return searchData.filter(
      (searchFilteredProperties) => stateData.filter(
        (stateFilteredProperties) => checkboxData.includes(stateFilteredProperties),
      ).includes(searchFilteredProperties),
    );
  }

  /**
   * Function that closes the autocomplete results list
   * @returns {any}
   */
  CloseAutoComplete() {
    this.Autocomplete.closeAllLists();
  }
}