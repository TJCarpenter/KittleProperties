class HousingTypeFilter {
  constructor() {
    // TODO Make these available in the settings screen
    this.columnValue = 9;
    this.columnName = 'HOUSING TYPE';
    this.setFilter();
  }

  /**
   * The function SetFilter initializes or updates the filter based on the suplied parameters
   * @param {Boolean} familyFilter
   * @param {Boolean} seniorFilter
   * @param {Boolean} studentFilter
   */
  setFilter(familyFilter = false,
    seniorFilter = false,
    studentFilter = false) {
    this.filter = {
      'family': familyFilter,
      'senior': seniorFilter,
      'student': studentFilter,
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