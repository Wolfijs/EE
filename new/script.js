document.addEventListener('DOMContentLoaded', function () {
  // Burger icon and sidebar functionality
  document.querySelector(".burger-icon").addEventListener("click", () => {
    toggleMenu();
  });

  window.toggleMenu = function () {
    document.getElementById("mySidebar").style.width = "50%";
  };

  window.closeMenu = function () {
    document.getElementById("mySidebar").style.width = "0";
  };

  // Sample list of countries
  var countries = ["Afghanistan", "Albania", "Algeria", /* ... rest of the countries ... */ "Zambia", "Zimbabwe"];

  // Populate the country dropdown
  var countryDropdown = document.getElementById('countryDropdown');
  countries.forEach(function (country) {
    var option = document.createElement('option');
    option.value = country;
    option.text = country;
    countryDropdown.add(option);
  });

  // Fetch categories from the API
  fetch('http://localhost/new/api/Category.php')
    .then(response => response.json())
    .then(categories => {
      // Populate the category dropdown
      var categoryDropdown = document.getElementById('categoryDropdown');
      categoryDropdown.innerHTML = '<option value=""></option>'; // Clear existing options

      categories.forEach(function (category) {
        var option = document.createElement('option');
        option.value = category.name; // Assuming 'name' is the property you want to display
        option.text = category.name;
        categoryDropdown.add(option);
      });
    })
    .catch(error => {
      console.error('Error fetching categories:', error);
    });
});
