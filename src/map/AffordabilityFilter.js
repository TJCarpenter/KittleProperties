class AffordabilityFilter {
  constructor() {
    // TODO Make these available in the settings screen
    this.columnValue = 8;
    this.columnName = 'AFFORDABILITY';
    this.setFilter();
  }

  /**
   * The function SetFilter initializes or updates the filter based on the suplied parameters
   * @param {Boolean} affordableFilter
   * @param {Boolean} marketRateFilter
   * @param {Boolean} luxuryFilter
   * @param {Boolean} marketRateAffordableFilter
   */
  setFilter(affordableFilter = false,
    luxuryFilter = false,
    marketRateFilter = false,
    marketRateAffordableFilter = false) {
    this.filter = {
      'affordable': affordableFilter,
      'luxury': luxuryFilter,
      'market rate': marketRateFilter,
      'market rate/affordable': marketRateAffordableFilter,
    };
  }

  /**
   * Returns the filtered object with the updated parameters
   * @returns {Object}
   */
  getFilter() {
    return Object.values(this.filter);
  }

  /**
   * Returns an array that contains only the values that are active.
   * If no filters are active, an empty array is returned
   * @returns {Array}
   */
  getActiveFilters() {
    let activeFilters = [];

    Object.entries(this.filter).forEach(([filterName, filterState]) => {
      if (filterState === true) {
        activeFilters.push(filterName);
      }
    });

    // Push all as active for intersection filtering
    if (activeFilters.length === 0) {
      activeFilters = Object.keys(this.filter);
    }

    return activeFilters;
  }
}