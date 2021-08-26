/* global AffordabilityFilter, HousingTypeFilter */

class Controller {
  constructor(Model, View) {
    this.Model = Model;
    this.View = View;

    // Initialize the listeners
    this.addEventListeners();

    // Set the initial filters
    this.AffordabilityFilter = new AffordabilityFilter();
    this.HousingTypeFilter = new HousingTypeFilter();

    // Draw the initial map
    this.drawMap();
  }

  /**
   * Function to handle the dropdown button click event
   */
  handleToggleDropdown(e) {
    this.View.toggleDropdown(e);
  }

  /**
   * Function to handle the selection of the items in the dropdown menu
   */
  handleDropdownSelection(e) {
    this.View.dropdownContentSelect(e);
    this.drawMap();
  }

  /**
   * Function to handle the selection of the checkboxes event
   */
  handleCheckboxFilterSelection(e) {
    this.checkboxFilterSelection(e);
  }

  /**
   * Function to clear the checkboxes and clear filters
   */
  handleClearFilters(e) {
    this.clearFilters(e);
  }

  /**
   * Function to handle the search button click event
   */
  handlePropertySearch(e) {
    this.drawMap(e);
    this.Model.closeAutoComplete(e);
  }

  handlePropertyClear(e) {
    this.View.clearSearch(e);
  }

  /**
   * Function to handle the filter menu open button event
   */
  handleOpenFilterMenu(e) {
    this.View.openFilterMenu(e);
  }

  /**
   * Function to handle the filter menu close button event and the apply filter button event
   */
  handleCloseFilterMenu(e) {
    this.View.closeFilterMenu(e);
  }

  /**
   * Function to set the filters based on the selected checkboxes
   */
  checkboxFilterSelection() {
    const housingTypeSelection = $('[name="housing_type"]').map((_key, element) => element.checked);
    this.HousingTypeFilter.setFilter(
      housingTypeSelection[0], // Family
      housingTypeSelection[1], // Senior
      housingTypeSelection[2], // Student (Not Used {default: false})
    );

    const affordabilitySelection = $('[name="affordability"]').map((_key, element) => element.checked);
    this.AffordabilityFilter.setFilter(
      affordabilitySelection[0], // Affordable
      affordabilitySelection[1], // Luxury
      affordabilitySelection[2], // Market Rate
      affordabilitySelection[3], // Market Rate & Affordable
    );

    // Draw the map with the updated filters
    this.drawMap();
  }

  /**
   * Function that returns whether or not there are active filters in place such as
   * a search query, a selected state, checked affordability checkboxed, or
   * checked housing type checkboxes
   * @returns {Boolean}
   */
  isFilteredSearch() {
    // Create a some function to find active filters
    const checked = (filter) => filter === true;

    // Check each filter to see if it is set
    const isSeachQuery = $('.js-search-input').val() !== '';
    const isStateSelect = $('.js-state-input').val() !== '';
    console.log(isStateSelect);
    const hasHousingFilter = this.HousingTypeFilter.getFilter().some(checked);
    const hasAffordabilityFilter = this.AffordabilityFilter.getFilter().some(checked);

    // Will return true if any filters are not empty
    if (isSeachQuery || isStateSelect || hasHousingFilter || hasAffordabilityFilter) {
      return true; // Is a Filtered Search
    }

    return false; // Is not a filtered search
  }

  /**
   * Function to draw the map based on the current filters. Displays markers only if a filter is set
   */
  async drawMap() {
    // Check if there are active filters
    const filteredSearch = this.isFilteredSearch();

    // Clear the old map before drawing the new one
    this.View.clearAll();

    let propertyData;

    // Only get the filtered data if it is a filtered search
    if (filteredSearch) {
      // Get the data that passes the search query filter
      const searchFilterData = await this.Model.findPropertyNames($('.js-search-input').val());

      // Get the data that passes the state select filter
      const stateFilterData = await this.Model.getPropertiesFromState($('.js-state-input').val());

      // Get the data that passes the housing type and/or the affordability filter
      const checkboxFilterData = await this.Model.findPropertiesByFilters(
        this.HousingTypeFilter.getActiveFilters(),
        this.AffordabilityFilter.getActiveFilters(),
      );

      /**
       * Pass the filtered data through an intersection filter and retreive only the ones that meet all 3 of
       * the filters
       */
      propertyData = Model.intersection(
        searchFilterData,
        stateFilterData,
        checkboxFilterData,
      );
    } else {
      propertyData = await this.Model.getPropertyData();
    }

    // Set the state data from the data retreived from the filters
    const stateData = this.Model.findStatesDataFromPropertyData(propertyData);

    // Add the state polygon from the state data
    if (stateData !== null && typeof (stateData.then) === 'function') {
      // Promise
      stateData.then((stateElements) => {
        stateElements.forEach((state) => {
          this.View.displayStatePoly(state);
        })
      });
    } else {
      // Object
      stateData.forEach((state) => {
        this.View.displayStatePoly(state);
      });
    }



    // Group the properties by state
    const propertyDataByState = Model.sortByState(propertyData);

    // Add each property by state
    Model.findUniqueStatesFromPropertyData(propertyData).forEach((state) => {
      // Display Markers for filtered searches
      let stateMarkerCluster;
      let propertyMarker;

      if (filteredSearch) {
        stateMarkerCluster = this.View.createMarkerCluster();
      }

      // Add each property to the given state and populate the properties listing
      propertyDataByState[state].forEach((property) => {
        // Add the property to the listings area
        this.View.displayListings(property);

        // Group and display the markers for filtered searches
        if (filteredSearch) {
          // Create an individual property marker
          propertyMarker = this.View.createPropertyMarker(property);

          // Add the individual property marker to the state cluster
          View.addPropertyMarkerToStateCluster(stateMarkerCluster, propertyMarker);
        }
      });

      // Only display the property markers if they are created from a filtered search
      if (filteredSearch) {
        this.View.addStateMarkerClusterToMap(stateMarkerCluster);
      }
    });
  }

  /**
   * Function to clear the checkboxes, dropdown, and the input filters on the menu
   */
  clearFilters() {
    // Clear Checkmarks
    $('[name="housing_type"]').prop('checked', false);
    $('[name="affordability"]').prop('checked', false);

    // Clear the State Selection
    $('.js-state-input').val('');

    // Clear the Search Query
    $('.js-search-input').val('');

    // Update the checkbox filters
    this.checkboxFilterSelection();
  }

  /**
   * Function that adds listenters to buttons, checkboxes, and inputs
   *
   * The click event listener is able to capture mobile events as well therefore tap, touchstart,
   * or touchend are not needed
   *
   * The off function ensures that the eventlistener is not accidentally created more than once
   * therefore triggering the event more than once
   */
  addEventListeners() {
    // Adds listener to the dropdown button
    $('.js-dropdown-button').off('click');
    $('.js-dropdown-button').bind('click', this.handleToggleDropdown.bind(this));

    // Adds listener to the dropdown items
    $('.js-dropdown-item').off('click');
    $('.js-dropdown-item').bind('click', this.handleDropdownSelection.bind(this));

    // Adds a listenter to the checkboxes
    $('.js-checkbox-filter').change(this.handleCheckboxFilterSelection.bind(this));

    // Adds a listener to the property search button
    $('.js-search-button').off('click');
    $('.js-search-button').bind('click', this.handlePropertySearch.bind(this));

    // Adds a listenter to the property search clear button
    $('.js-search-clear-button').off('click');
    $('.js-search-clear-button').bind('click', this.handlePropertyClear.bind(this));

    // TODO Adds a listener to the property search clear button

    // Adds a listener to the autocomplete items
    $('.js-autocomplete-items').off('click');
    $('.js-autocomplete-items').bind('click', this.handlePropertySearch.bind(this));

    // Adds a listenter to the clear filters button
    $('.js-reset-filters').off('click');
    $('.js-reset-filters').bind('click', this.handleClearFilters.bind(this));

    // Adds a listener to the close filter menu button
    $('.js-filter-menu_close').off('click');
    $('.js-filter-menu_close').bind('click', this.handleCloseFilterMenu.bind(this));

    // Adds a listener to the apply filter button
    $('.js-apply-filters').off('click');
    $('.js-apply-filters').bind('click', this.handleCloseFilterMenu.bind(this));

    // Adds a listener to the open filter menu button
    $('.js-open-filter-menu').off('click');
    $('.js-open-filter-menu').bind('click', this.handleOpenFilterMenu.bind(this));
  }
}