class AddModel {
  constructor() {
    // this.dataEndpoint = 'https://kittleproperties.com/wp-json/api/v1/properties';
    this.dataEndpoint = 'http://127.0.0.1/wp/wp-json/api/v1/properties';
    this.response = this.getResponse();
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
   * The getPropertyIDs function returns an array of the property IDs
   * @returns {Array}
   */
  getPropertyIDs() {
    return this.response.then((data) => data.PROPERTIES.map(
      (propertyElement) => propertyElement.ID,
    ));
  }
}