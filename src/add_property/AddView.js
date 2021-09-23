class AddView {
  constructor() {

  }

  /**
   * Function to open and close the dropdown state select. The content will open based on the size 
   * and number of elements in the dropdown.
   * @param {Event} e
   */
  toggleDropdown(e) {

    // Get the dropdown content
    let dropdownContent = $(e.target).closest('.js-dropdown-wrapper').find('.js-new-property-dropdown-content');

    // Sets the height of the dropdown based on the number of elements
    let dropdownSize = dropdownContent.children().outerHeight() * (dropdownContent.children().length);

    // Open or close the dropdown content when exiting
    if (dropdownContent.height() > 0 || e.type == 'focusout') {
      dropdownContent.animate({
        height: '0px',
      });
    } else {
      dropdownContent.animate({
        // Max height for the dropdown is 50vh else it is the size of its elements
        height: dropdownSize > $(window).height() / 2 ? '50vh' : `${dropdownSize}px`,
      });
    }
  }

  /**
   * Function to add the selected dropdown item to the filter and close the dropdown
   * @param {Event} e
   */
  dropdownContentSelect(e) {

    // Get the dropdown values
    let dropdownInput = $(e.target).closest('.js-dropdown-wrapper').find('.js-dropdown-input');

    // Set the dropdown value to the input
    dropdownInput.val(e.target.id);

    // Close the dropdown
    this.toggleDropdown(e);
  }

  /**
   * The displayErrorMessage function displays an error message on the given element
   * @param {Object} element
   * @param {String} message
   */
  displayErrorMessage(element, message) {

    // Get the parent element
    let parentElement = element.parent();

    // Find each element within the parent
    let errorImage = parentElement.find('.js-error-image');
    let successImage = parentElement.find('.js-success-image');
    let errorText = parentElement.find('.js-error-message_text');
    let errorMessage = parentElement.find('.js-error-message');
    let loadingImage = parentElement.find('.js-load-image');

    // Fade any loading images out
    $(loadingImage).fadeOut(1);

    // Fade any success images out
    $(successImage).fadeOut(1);

    // Fade error image in
    $(errorImage).fadeIn(100);

    // Remove success class and add error class
    element.removeClass('success').addClass('error');

    // Set the error text
    $(errorText).html(message);

    // Fade the error message in
    $(errorMessage).fadeIn(100);
  }

  /**
   * Display a loading icon while waiting for an API response
   * @param {Object} element 
   */
  displayLoading(element) {
    // Get the parent element
    let parentElement = element.parent();

    // Get the loading image
    let loadingImage = parentElement.find('.js-load-image');

    // Clear any existing states
    this.clearErrorAndSuccess(element);

    // Fade the loading image in
    loadingImage.fadeIn(100);

  }

  /**
   * The displaySuccess function displays a success on a given element
   * @param {Object} element
   */
  displaySuccess(element) {

    // Get the parent element
    let parentElement = element.parent();

    // Find each element within the parent
    let errorImage = parentElement.find('.js-error-image');
    let successImage = parentElement.find('.js-success-image');
    let errorMessage = parentElement.find('.js-error-message');
    let loadingImage = parentElement.find('.js-load-image');

    // Fade any loading images out
    $(loadingImage).fadeOut(1);

    // Fade any error messages out
    $(errorMessage).fadeOut(1);

    // Fade any error images out
    $(errorImage).fadeOut(1);

    // Add success class and remove error class
    element.addClass('success').removeClass('error');

    // Fade success image in
    $(successImage).fadeIn(100);
  }

  /**
   * The clearErrorAndSuccess function removes any error or success on a given element
   * @param {Object} element
   */
  clearErrorAndSuccess(element) {

    // Get the parent element
    let parentElement = element.parent();

    // Find each element within the parent
    let errorImage = parentElement.find('.js-error-image');
    let successImage = parentElement.find('.js-success-image');
    let errorMessage = parentElement.find('.js-error-message');
    let loadingImage = parentElement.find('.js-load-image');

    // Fade any loading images out
    $(loadingImage).fadeOut(1);

    // Fade any success images out
    $(successImage).fadeOut(100);

    // Face any error images out
    $(errorImage).fadeOut(100);

    // Fade any error messages out
    $(errorMessage).fadeOut(100);

    // Remove any error or success class
    element.removeClass('error success');
  }
}