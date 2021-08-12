class Model {
  constructor() {
    this.dataEndpoint = 'http://127.0.0.1/wp/wp-json/api/v1/properties';
    this.response = this.getResponse();
  }


  /**
   * Function that retreives the data from the endpoint and serves it to other
   * functions in a promise format. If the promise fails, no data is returned.
   * @returns {JSON}
   */
  async getResponse() {
    return fetch(this.dataEndpoint, {
      cache: 'force-cache',
    }).then((response) => response.json());
  }

  /**
   * Function that extracts all of the used IDs. Returns in an array format
   * @returns {Array}
   */
  getIds() {
    if (null != this.response && typeof (this.response.then) === 'function') {
      // Promise
    }
  }
}