<style>
  .page-title-area {
    background-color: #00b0e8;
    position: relative;
    z-index: 1;
    padding-top: 130px;
    padding-bottom: 120px;
  }
/* ..........load-more-loder....... */
.loader {
    border: 4px solid #3498db; /* Blue color */
    border-top: 4px solid #f3f3f3; /* Light color */
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .loading-button {
    background-color: blue;
    color: white;
  }
  /* ............reloder............ */
  #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    /* Choose your desired overlay background color */
    z-index: 9999;
    display: none;
  }

  .spinner {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50px;
    height: 50px;
    border: 4px solid #ccc;
    /* Choose your desired spinner color */
    border-top-color: #00B0E8;
    /* Choose your desired spinner color */
    border-radius: 50%;
    animation: spin 1s infinite linear;
  }

  @keyframes spin {
    from {
      transform: translate(-50%, -50%) rotate(0deg);
    }

    to {
      transform: translate(-50%, -50%) rotate(360deg);
    }
  }

  /* .........filter button css........ */
  .filter-area {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }

  div#nav-search-tab .nav-link.nav-item {
    border-bottom: none !important;
    padding: 16px 26px;
  }

  div#nav-tabSearchContent {
    border: none;
    background: #fff;
    border-radius: 0 8px 8px 8px;
    max-width: 655px;
    overflow: visible;
    position: relative;
    z-index: 999;
  }

  .landing-search-fields {
    padding: 16px;
    min-width: 655px;
    gap: 12px;
    flex-wrap: wrap;
    padding-bottom: 0;
  }

  .landing-search-fields .dropdown.searchfiler-drop {
    flex: auto;
  }

  .landing-search-fields .dropdown.searchfiler-drop .dropdownFilter {
    height: 48px;
    background: #EEF2F6;
    border-radius: 8px;
    color: #8F9CA9;
    margin: 0;
  }

  .landing-search-fields .dropdown.searchfiler-drop._Button1 {
    max-width: 217px;
  }

  .landing-search-fields .dropdown.searchfiler-drop._Button2 {
    max-width: 167px;
    min-width: 167px;
  }

  .landing-search-fields .dropdown.searchfiler-drop._Button3 {
    max-width: 215px;
    min-width: 215px;
  }

  .landing-search-fields .dropdown.searchfiler-drop._field {
    max-width: 395px;
    min-width: 395px;
  }

  .landing-search-fields .dropdown.searchfiler-drop._search {
    max-width: 216px;
    min-width: 216px;
  }

  .landing-search-fields .dropdown.searchfiler-drop span {
    font-size: 14px;
    line-height: 18px;
    color: #374052;
  }

  .landing-search-fields .dropdown.searchfiler-drop .dropdown-menu.dropdown-content.show {
    display: block;
    max-height: 300px;
    overflow: auto;
    border-radius: 0;
    border: none;
    box-shadow: 0px 2px 4px rgba(48, 48, 48, 0.1);
    margin-top: 5px;
    padding: 0;
    z-index: 9;
  }

  .dropdown-menu.dropdown-content.show .filter_button1_input,
  .dropdown-menu.dropdown-content.show .filter_button2_input,
  .dropdown-menu.dropdown-content.show .filter_button3_input {
    padding: 8px;
    border: none;
    outline: none;
    border-bottom: 1px solid #E5E5E5;
    width: 100%;
    color: #000;
  }

  .dropdown-menu.dropdown-content.show .searchAll-list a.dropdown-item {
    padding: 10px;
    color: #374052;
  }

  .dropdown-menu.dropdown-content.show .searchAll-list a.dropdown-item:hover {
    background: #EEF2F6;
    color: #222;
    text-decoration: none;
  }

  .search-label {
    display: inline-block;
    margin-bottom: 8px;
    color: #374052;
    font-size: 14px;
  }

  .searchAll-list::-webkit-scrollbar {
    width: 8px;
    background-color: #F5F5F5;
  }

  .searchAll-list::-webkit-scrollbar-thumb {
    background-color: #000;
    border-radius: 10px;
  }

  .searchAll-list::-webkit-scrollbar-track {
    background-color: #F5F5F5;
  }

  .searchAll-list::-webkit-scrollbar-corner {
    background-color: #F5F5F5;
  }

  .landing-search-fields .dropdown.searchfiler-drop._field {
    max-width: 395px;
    min-width: 395px;
  }

  .landing-search-fields .dropdown.searchfiler-drop._search {
    max-width: 216px;
    min-width: 216px;
  }

  .landing-search-fields .dropdown.searchfiler-drop span {
    width: 80%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block;
    padding: 3px 0 0;
  }

  .landing-search-fields .dropdown.searchfiler-drop .dropdownFilter::after {
    margin-top: 5px;
  }

  .landing-search-fields .dropdown.searchfiler-drop .search-field {
    background: #eef2f6;
    border-radius: 8px;
    padding: 12px 16px;
    height: 48px;
    border: none;
    min-width: 270px;
    font-size: 14px;
    font-weight: 500;
  }

  .landing-search-fields .dropdown.searchfiler-drop .search-field::-webkit-input-placeholder {
    color: #8F9CA9;
    opacity: 1;
  }

  .landing-search-fields .btn-search {
    width: 100%;
    border: none;
    padding: 0;
    background:#15d2ff;
    border-radius: 8px;
    height: 48px;
    color: #fff;
    font-weight: 400;
    font-size: 14px;
    line-height: 24px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
  }

  /* ....selected-css............. */
  select {
    word-wrap: normal;
    display: block;
    width: 100%;
    padding: 0.25rem 1.5rem rem !important;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
  }

  select option {
    padding: 10px;
  }





  /* ..............dtudent-card css.............. */
  .card-1 {
    position: relative;
    width: 100%;
    height: 400px;
    background: #fff;
    border-radius: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(15px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
  }

  .card-button {
    padding: 8px;
    color: aliceblue;
    background: #03a9f4;
    border-radius: 10px;
    border: none;
    margin-top: 10px;
  }

  .img-bx {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 45%;
    overflow: hidden;
    transform-origin: top;
  }

  .img-bx img {
    position: absolute;
    top: -39px;
    left: 0;
    width: 100%;
    object-fit: cover;
    border-radius: 100px;
  }

  .content {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    padding-bottom: 30px;
  }

  .content .detail {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    text-align: center;
  }

  .content .detail h2 {
    color: #444;
    font-size: 1.4em;
    font-weight: bolder;
  }

  .content .detail .designation {
    font-size: 0.7em;
    color: #03a9f4;
    font-weight: normal;
  }

  .total-no-sub {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    min-height: 23px;
  }

  .total-no-sub .selection-badge {
    padding: 4px 6px;
    margin-left: 10px;
    margin-bottom: 10px;
    min-height: 23px;
    min-width: 25px;
    font-weight: 600;
    font-size: 10px;
    line-height: 15px;
    border: none;
    border-radius: 10px;
  }

  .load-more {
    background: #00b0e8;
    padding: 10px;
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 500;
  }

  /* Media queries for responsive design */
  @media only screen and (max-width: 1024px) {
    .landing-search-fields .dropdown.searchfiler-drop .dropdownFilter {
      margin: 0;
    }

    .landing-search-fields .dropdown.searchfiler-drop .dropdownFilter {
      height: 48px;
      background: #EEF2F6;
      border-radius: 8px;
      color: #8F9CA9;
      margin: 0;
    }
  }

  @media screen and (min-width: 268px) and (max-width: 567px) {
    .landing-search-fields {
      padding: 16px;
      min-width: 0;
      gap: 12px;
      flex-wrap: wrap;
      padding-bottom: 0;
      flex-direction: column;
    }

    .landing-search-fields .dropdown.searchfiler-drop._Button1 {
      max-width: 100%;
    }

    .landing-search-fields .dropdown.searchfiler-drop._Button2 {
      max-width: 100%;
      min-width: 167px;
    }

    .landing-search-fields .dropdown.searchfiler-drop._Button3 {
      max-width: 100%;
      min-width: 215px;
    }

    .filter-area {
      display: block;
    }
  }

  @media screen and (min-width: 768px) and (max-width: 967px) {}
</style>
<!-- Start Page Title Area -->
<div class="page-title-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 pt-5">
        <div class="page-title-content">
          <h1>Our Students</h1>
          <p>Unlock the door to endless possibilities with our diverse range of opportunities!</p>
        </div>
        <div class="filter-area">
          <div class="landing-search-fields d-flex">
            <div class="dropdown searchfiler-drop">
              <input name="web_search" type="text" class="form-control search-field" id="session_search_form2"
                placeholder="Enter Keyword (optional)">
              <div class="field-err" id="session_seach_valdation_set"></div>
            </div>
            <div class="dropdown searchfiler-drop">
              <button class="btn-search session_search_onlanding" id="reloadButton">Search</button>
              <div id="overlay">
                <div class="spinner"></div>
              </div>
            </div>
          </div>
          <div class="d-flex landing-search-fields">
            <div class="dropdown searchfiler-drop _Button1">
              <button class="dropdown-toggle dropdown-lg-heading filters form-control dropdownFilter" type="button"
                id="dropdownMenuButton-searchfiler1" data-toggle="dropdown" aria-haspopup="true" data-display="static"
                aria-expanded="false">
                <span id="session_button1_selected">Course</span>
              </button>
              <div class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton-searchfiler1"
                id="button1_filter">
                <div class="py-2">
                  <input type="text" class="form-control filter_button1_input" placeholder="Type to search.......">
                </div>
                <div class="searchAll">
                  <select class="searchAll-list" name="states[]" multiple="multiple">
                    <option value="AL"><a class="dropdown-item" href="#">Web Development</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">App Development</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Graphics Designing</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Social Media Marketing</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">SQAg</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Wordpress</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">React native</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">UI/UX</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">SEO</a></option>
                    
                  </select>
                </div>
              </div>
            </div>
            <div class="dropdown searchfiler-drop _Button2">
              <button class="dropdown-toggle dropdown-lg-heading filters form-control dropdownFilter" type="button"
                id="dropdownMenuButton-searchfiler2" data-toggle="dropdown" aria-haspopup="true" data-display="static"
                aria-expanded="false">
                <span id="session_button2_selected">Experience</span>
              </button>
              <div class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton-searchfiler2"
                id="button2_filter">
                <div class="py-2">
                  <input type="text" class="form-control filter_button2_input" placeholder="Type to search.......">
                </div>
                <div class="searchAll">
                  <select class="searchAll-list" name="states[]" multiple="multiple">
                  <option value="AL"><a class="dropdown-item" href="#">1 Year</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">2 Yeart</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">3 Year</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">4 Year</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">5 Year</a></option>

                  </select>
                </div>
              </div>
            </div>
            <div class="dropdown searchfiler-drop _Button3">
              <button class="dropdown-toggle dropdown-lg-heading filters form-control dropdownFilter" type="button"
                id="dropdownMenuButton-searchfiler3" data-toggle="dropdown" aria-haspopup="true" data-display="static"
                aria-expanded="false">
                <span id="session_button3_selected">Technology</span>
              </button>
              <div class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenuButton-searchfiler3"
                id="button3_filter">
                <div class="py-2">
                  <input type="text" class="form-control filter_button3_input" placeholder="Type to search.......">
                </div>
                <div class="searchAll">
                  <select class="searchAll-list" name="states[]" multiple="multiple">
                  <option value="AL"><a class="dropdown-item" href="#">React Native</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Bootstrap,Laravel</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Video Editing</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Adobephotoshop,Illustrater</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Digitel Marketing</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">SQA</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">PHP,Wordpress</a></option>
                    <option value="AL"><a class="dropdown-item" href="#">Bootstrap,HTML,CSS,Javascript</a></option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 py-lg-0 py-5">
        <div class="pt-2">
          <img src="assets/img/header-search-img.png" alt="">
        </div>
      </div>
    </div>


  </div>
</div>

<!-- End Page Title Area -->

<!-- ........Student-Card............. -->


<div class="container">
  <div class="row mb-5">
    <?php foreach ($userdata as $item): ?>
      <div class="col-lg-3 col-md-6 col-sm-12" id="myTable">
        <div class="card-1 mt-5">
          <div class="img-bx">
            <img src="assets/img/young-smiling-confident-woman-using-laptop-computer-looking-camera-isolated-white-background_231208-9497.avif" alt="img" />
          </div>
          <div class="content">
            <div class="detail">
              <h2><?php echo $item['student_name']; ?><br />
                <span class="designation"><?php echo $item['course_name']; ?></span>
              </h2>
              <div class="total-no-sub bg-green">
                <?php if (isset($item['technologies'])): ?>
                  <?php $tools = explode(',', $item['technologies']); ?>
                  <?php foreach ($tools as $tool): ?>
                    <button class="selection-badge curriculum"><?php echo trim($tool); ?></button>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
              <button class="card-button">Download CV</button>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div  class="mb-5 d-flex justify-content-center">
    <button class="load-more">Load More</button>
    <div class="loader" style="display: none;"></div>
  </div>
</div>

<!-- .................js............... -->

<script>
  $(document).ready(function () {
    // loader-js
    $('#reloadButton').click(function () {
      $('#overlay').css('display', 'block');
      setTimeout(function () {
        window.location.reload();
      }, 1000);
    });

    // filter-button-js
    const dropdownToggle1 = $('._Button1 .dropdownFilter');
    const dropdownMenu1 = $('#button1_filter');
    const filterInput1 = $('.filter_button1_input');
    const selectedButton1 = $('#session_button1_selected');
    const storageKey1 = 'dropdownState1';

    const dropdownToggle2 = $('._Button2 .dropdownFilter');
    const dropdownMenu2 = $('#button2_filter');
    const filterInput2 = $('.filter_button2_input');
    const selectedButton2 = $('#session_button2_selected');
    const storageKey2 = 'dropdownState2';

    const dropdownToggle3 = $('._Button3 .dropdownFilter');
    const dropdownMenu3 = $('#button3_filter');
    const filterInput3 = $('.filter_button3_input');
    const selectedButton3 = $('#session_button3_selected');
    const storageKey3 = 'dropdownState3';

    // Function to close all dropdowns
    function closeAllDropdowns() {
      dropdownMenu1.removeClass('show');
      dropdownMenu2.removeClass('show');
      dropdownMenu3.removeClass('show');
      localStorage.removeItem(storageKey1);
      localStorage.removeItem(storageKey2);
      localStorage.removeItem(storageKey3);
    }

    // Check if the clicked element is inside any of the dropdowns
    function handlePageClick(event) {
      const target = event.target;

      if (
        !dropdownToggle1.is(target) &&
        !dropdownMenu1.is(target) &&
        !dropdownToggle2.is(target) &&
        !dropdownMenu2.is(target) &&
        !dropdownToggle3.is(target) &&
        !dropdownMenu3.is(target)
      ) {
        closeAllDropdowns();
      }
    }

    dropdownToggle1.click(function () {
      if (dropdownMenu1.hasClass('show')) {
        dropdownMenu1.removeClass('show');
        localStorage.removeItem(storageKey1);
      } else {
        closeAllDropdowns();
        dropdownMenu1.addClass('show');
        localStorage.setItem(storageKey1, 'open');
      }
    });

    dropdownToggle2.click(function () {
      if (dropdownMenu2.hasClass('show')) {
        dropdownMenu2.removeClass('show');
        localStorage.removeItem(storageKey2);
      } else {
        closeAllDropdowns();
        dropdownMenu2.addClass('show');
        localStorage.setItem(storageKey2, 'open');
      }
    });

    dropdownToggle3.click(function () {
      if (dropdownMenu3.hasClass('show')) {
        dropdownMenu3.removeClass('show');
        localStorage.removeItem(storageKey3);
      } else {
        closeAllDropdowns();
        dropdownMenu3.addClass('show');
        localStorage.setItem(storageKey3, 'open');
      }
    });

    // Add event listener to the document for handling page clicks
    $(document).click(handlePageClick);

    // load-More-functionality
    const loadMoreButton = $(".load-more");
    const loader = $(".loader");
    const cards = $(".card-1");
    const totalCards = cards.length;
    const visibleCards = 4;

    // Initially hide all cards except the first 4
    cards.slice(visibleCards).hide();

    loadMoreButton.click(function () {
      // Hide load more button
      loadMoreButton.hide();
      // Show the loader
      loader.show();

      // Simulate loading delay
      setTimeout(function () {
        // Show hidden cards
        cards.slice(visibleCards).show();

        // Hide the loader
        loader.hide();
      }, 2000); // Adjust the delay time as needed
    });

    // Serch-filter
    $("#session_search_form2").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $("#myTable ").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>
