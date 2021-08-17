class Autocomplete {
  constructor(inputElement, autocompleteValues) {
    this.inputElement = inputElement;
    this.autocompleteValues = autocompleteValues;

    this.currentFocus = -1;

    inputElement.on('input', () => {
      Autocomplete.closeAllLists();

      if (!$(inputElement)[0].value) {
        return false;
      }

      this.currentFocus = -1;

      $('.js-autocomplete').append(`<div class="autocomplete_items js-autocomplete-items" id="${$(inputElement)[0].id}autocomplete-list"></div>`);

      const query = $(inputElement)[0].value.toLowerCase();

      autocompleteValues.then((data) => {
        const matches = data.filter((property) => property.toLowerCase().indexOf(query) >= 0);

        matches.forEach((match) => {
          $('.js-autocomplete_items').append(
            $('<div></div>').html(
              `${match}<input type="hidden" value ="${match}">`,
            ).bind('click', () => {
              $('.js-search-input').val(match);
              $('.js-search-button').click();
              Autocomplete.closeAllLists();
            }),
          );
        });
      });
      return true;
    });

    inputElement.on('keydown', (e) => {
      if (e.keyCode === 40) { // Down Arrow

        // Moving down the list
        this.currentFocus += 1;

        // Highlight the property that is focused
        this.addActive();

      } else if (e.keyCode === 38) { // Up Arrow

        // Moving up the list
        this.currentFocus -= 1;

        // Highlight the property that is focused
        this.addActive();

      } else if (e.keyCode === 13) { // Enter

        if (this.currentFocus > -1) {

          // Set the search query to the selected property
          $('.js-search-input').val($('.js-autocomplete_active')[0].innerText);

          // Click the search button to start the search
          $('.js-search-button').click();

          // Close the list
          Autocomplete.closeAllLists();

        }
      }
    });
  }

  /**
   * Function to close the current autocomplete list
   * @author Tyler
   */
  static closeAllLists() {
    // Remove all properties from the dropdown list
    $('.js-autocomplete_items').remove();
  }

  /**
   * Function to add the active class to the selected autocomplete item
   * @author Tyler
   */
  addActive() {
    const autocompleteElements = $('.js-autocomplete_items').find('div');

    if (autocompleteElements.length === 0) {
      return false;
    }

    Autocomplete.removeActive();

    if (this.currentFocus >= autocompleteElements.length) {
      this.currentFocus = 0;
    }

    if (this.currentFocus < 0) {
      this.currentFocus = (autocompleteElements.length - 1);
    }

    $(autocompleteElements[this.currentFocus]).addClass('js-autocomplete_active autocomplete_active');

    return true;
  }

  /**
   * Function to remove the active class from all autocomplete items
   * @author Tyler
   */
  static removeActive() {
    $('.js-autocomplete_active').removeClass('js-autocomplete_active autocomplete_active');
  }
}