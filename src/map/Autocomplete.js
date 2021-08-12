class Autocomplete {
  constructor(inputElement, autocompleteValues) {
    this.inputElement = inputElement;
    this.autocompleteValues = autocompleteValues;

    this.currentFocus = -1;

    inputElement.on('input', () => {
      this.closeAllLists();

      if (!$(inputElement)[0].value) {
        return false;
      }

      this.currentFocus = -1;

      $('.autocomplete').append(`<div class="autocomplete-items js-autocomplete-items" id="${$(inputElement)[0].id}autocomplete-list"></div>`);

      const query = $(inputElement)[0].value.toLowerCase();

      autocompleteValues.then((data) => {
        const matches = data.filter((property) => property.toLowerCase().indexOf(query) >= 0);

        matches.forEach((match) => {
          $('.autocomplete-items').append(
            $('<div></div>').html(
              `${match}<input type="hidden" value ="${match}">`,
            ).bind('click', () => {
              $('#search_query').val(match);
              $('#search').click();
              this.closeAllLists();
            }),
          );
        });
      });
      return true;
    });

    inputElement.on('keydown', (e) => {
      if (e.keyCode === 40) { // Down Arrow
        this.currentFocus += 1;
        this.addActive();
      } else if (e.keyCode === 38) { // Up Arrow
        this.currentFocus -= 1;
        this.addActive();
      } else if (e.keyCode === 13) { // Enter
        // e.preventDefault();

        if (this.currentFocus > -1) {
          $('#search_query').val($('.autocomplete-active')[0].innerText);
          $('#search').click();
          this.closeAllLists();
        }
      }
    });
  }

  /**
   * Function to close the current autocomplete list
   * @author Tyler
   */
  static closeAllLists() {
    $('.autocomplete-items').remove();
  }

  /**
   * Function to add the active class to the selected autocomplete item
   * @author Tyler
   */
  addActive() {
    const autocompleteElements = $('.autocomplete-items').find('div');

    if (autocompleteElements.length === 0) {
      return false;
    }

    this.removeActive();

    if (this.currentFocus >= autocompleteElements.length) {
      this.currentFocus = 0;
    }

    if (this.currentFocus < 0) {
      this.currentFocus = (autocompleteElements.length - 1);
    }

    $(autocompleteElements[this.currentFocus]).addClass('autocomplete-active');

    return true;
  }

  /**
   * Function to remove the active class from all autocomplete items
   * @author Tyler
   */
  static removeActive() {
    $('.autocomplete-active').removeClass('autocomplete-active');
  }
}