<template>
    <section ref="servicesection">
      <div class="container services-data-container">
        <div class="row">
          <div class="col-12">
            <div class="services-main-wrapper">
              
              <!-- filters -->
              <div class="filters-container">
                <!-- search -->
                <div class="services-search" id="services-search-container">
                  <svg width="51" height="50" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.755001" width="50" height="50" rx="25" fill="#EB5353"/>
                    <path d="M35.5459 33.2041L31.0938 28.75C32.4287 27.0104 33.0519 24.8282 32.837 22.6461C32.6222 20.4639 31.5853 18.4452 29.9367 16.9994C28.2882 15.5536 26.1514 14.789 23.9598 14.8607C21.7683 14.9324 19.6861 15.8351 18.1356 17.3856C16.5851 18.9361 15.6824 21.0183 15.6107 23.2098C15.539 25.4014 16.3036 27.5382 17.7494 29.1867C19.1952 30.8353 21.2139 31.8722 23.3961 32.087C25.5782 32.3019 27.7604 31.6787 29.5 30.3437L33.9559 34.8006C34.0606 34.9053 34.1848 34.9883 34.3215 35.0449C34.4583 35.1015 34.6048 35.1307 34.7528 35.1307C34.9008 35.1307 35.0474 35.1015 35.1841 35.0449C35.3208 34.9883 35.445 34.9053 35.5497 34.8006C35.6543 34.696 35.7373 34.5717 35.794 34.435C35.8506 34.2983 35.8798 34.1517 35.8798 34.0037C35.8798 33.8557 35.8506 33.7092 35.794 33.5725C35.7373 33.4357 35.6543 33.3115 35.5497 33.2069L35.5459 33.2041ZM17.875 23.5C17.875 22.2391 18.2489 21.0066 18.9494 19.9582C19.6499 18.9099 20.6455 18.0928 21.8104 17.6103C22.9753 17.1278 24.2571 17.0015 25.4937 17.2475C26.7303 17.4935 27.8662 18.1006 28.7578 18.9922C29.6494 19.8837 30.2565 21.0197 30.5025 22.2563C30.7485 23.4929 30.6222 24.7747 30.1397 25.9396C29.6572 27.1045 28.8401 28.1001 27.7918 28.8006C26.7434 29.5011 25.5109 29.875 24.25 29.875C22.5598 29.8733 20.9393 29.201 19.7441 28.0059C18.5489 26.8107 17.8767 25.1902 17.875 23.5Z" fill="white"/>
                  </svg>
                  <div class="input-group flex-nowrap search-box-label">
                    <label class="input-group-text">
                      {{$t('placeholder.search_for_a_service')}} : 
                    </label>
                    <input type="text" class="form-control custom-search-field rounded-3" v-model="search" placeholder="coaching, consultation etc" :disabled="isEmpty" @focus="addFocusClass()" @blur="removeFocusClass()">
                  </div>

                </div>

                <!-- other filters -->
                <div class="other-filters">
                  <p class="filters-title mb-0">
                    {{$t('landingpage.optimize_your_search')}} 
                  </p>
                </div>
                
                <div class="other-filters-dropdowns">
                    <!-- categories dropdown -->
                    <div class="input-group custom-dropdown flex-nowrap">
                      <label class="input-group-text" for="categoryDropdown">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.75 7.125V14.625C15.75 14.9565 15.6183 15.2745 15.3839 15.5089C15.1494 15.7433 14.8315 15.875 14.5 15.875H1.99997C1.66845 15.875 1.35051 15.7433 1.11609 15.5089C0.881665 15.2745 0.749969 14.9565 0.749969 14.625V7.125C0.749969 6.79348 0.881665 6.47554 1.11609 6.24112C1.35051 6.0067 1.66845 5.875 1.99997 5.875H14.5C14.8315 5.875 15.1494 6.0067 15.3839 6.24112C15.6183 6.47554 15.75 6.79348 15.75 7.125ZM2.62497 4.625H13.875C14.0407 4.625 14.1997 4.55915 14.3169 4.44194C14.4341 4.32473 14.5 4.16576 14.5 4C14.5 3.83424 14.4341 3.67527 14.3169 3.55806C14.1997 3.44085 14.0407 3.375 13.875 3.375H2.62497C2.45921 3.375 2.30024 3.44085 2.18303 3.55806C2.06582 3.67527 1.99997 3.83424 1.99997 4C1.99997 4.16576 2.06582 4.32473 2.18303 4.44194C2.30024 4.55915 2.45921 4.625 2.62497 4.625ZM3.87497 2.125H12.625C12.7907 2.125 12.9497 2.05915 13.0669 1.94194C13.1841 1.82473 13.25 1.66576 13.25 1.5C13.25 1.33424 13.1841 1.17527 13.0669 1.05806C12.9497 0.940848 12.7907 0.875 12.625 0.875H3.87497C3.70921 0.875 3.55024 0.940848 3.43303 1.05806C3.31582 1.17527 3.24997 1.33424 3.24997 1.5C3.24997 1.66576 3.31582 1.82473 3.43303 1.94194C3.55024 2.05915 3.70921 2.125 3.87497 2.125Z" fill="#202020"/>
                        </svg>
                      </label>
                      <select ref="categoryDropdownRef" id="categoryDropdown" v-model="selectedCategory" class="me-5 form-select select2 custom-select2-dropdown" :disabled="isEmpty">
                        <option value=""> {{$t('landingpage.all_categories')}} </option>
                        <option v-for="category in category_data" :key="category.id" :value="category.id">{{ category.name }}</option>
                      </select>  
                    </div>

                    <!-- price dropdown -->
                    <div class="input-group custom-dropdown flex-nowrap">
                      <label class="input-group-text" for="priceDropdown">
                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.75 10.875C10.75 11.2065 10.6183 11.5245 10.3839 11.7589C10.1495 11.9933 9.83155 12.125 9.50003 12.125H8.87503V9.625H9.50003C9.83155 9.625 10.1495 9.7567 10.3839 9.99112C10.6183 10.2255 10.75 10.5435 10.75 10.875ZM16.375 9C16.375 10.607 15.8985 12.1779 15.0057 13.514C14.1129 14.8502 12.844 15.8916 11.3593 16.5065C9.87469 17.1215 8.24102 17.2824 6.66493 16.9689C5.08883 16.6554 3.64109 15.8815 2.50479 14.7452C1.36849 13.6089 0.594659 12.1612 0.281154 10.5851C-0.0323512 9.00901 0.128551 7.37535 0.743513 5.8907C1.35847 4.40605 2.39988 3.1371 3.73603 2.24431C5.07218 1.35152 6.64306 0.875 8.25003 0.875C10.4042 0.877275 12.4695 1.73403 13.9928 3.25727C15.516 4.78051 16.3728 6.84581 16.375 9ZM12 10.875C12 10.212 11.7366 9.57607 11.2678 9.10723C10.799 8.63839 10.1631 8.375 9.50003 8.375H8.87503V5.875H9.18753C9.51905 5.875 9.837 6.0067 10.0714 6.24112C10.3058 6.47554 10.4375 6.79348 10.4375 7.125C10.4375 7.29076 10.5034 7.44973 10.6206 7.56694C10.7378 7.68415 10.8968 7.75 11.0625 7.75C11.2283 7.75 11.3873 7.68415 11.5045 7.56694C11.6217 7.44973 11.6875 7.29076 11.6875 7.125C11.6875 6.46196 11.4241 5.82607 10.9553 5.35723C10.4865 4.88839 9.85058 4.625 9.18753 4.625H8.87503V4C8.87503 3.83424 8.80919 3.67527 8.69198 3.55806C8.57477 3.44085 8.41579 3.375 8.25003 3.375C8.08427 3.375 7.9253 3.44085 7.80809 3.55806C7.69088 3.67527 7.62503 3.83424 7.62503 4V4.625H7.31253C6.64949 4.625 6.01361 4.88839 5.54477 5.35723C5.07593 5.82607 4.81253 6.46196 4.81253 7.125C4.81253 7.78804 5.07593 8.42393 5.54477 8.89277C6.01361 9.36161 6.64949 9.625 7.31253 9.625H7.62503V12.125H7.00003C6.66851 12.125 6.35057 11.9933 6.11615 11.7589C5.88173 11.5245 5.75003 11.2065 5.75003 10.875C5.75003 10.7092 5.68419 10.5503 5.56698 10.4331C5.44977 10.3158 5.29079 10.25 5.12503 10.25C4.95927 10.25 4.8003 10.3158 4.68309 10.4331C4.56588 10.5503 4.50003 10.7092 4.50003 10.875C4.50003 11.538 4.76343 12.1739 5.23227 12.6428C5.70111 13.1116 6.33699 13.375 7.00003 13.375H7.62503V14C7.62503 14.1658 7.69088 14.3247 7.80809 14.4419C7.9253 14.5592 8.08427 14.625 8.25003 14.625C8.41579 14.625 8.57477 14.5592 8.69198 14.4419C8.80919 14.3247 8.87503 14.1658 8.87503 14V13.375H9.50003C10.1631 13.375 10.799 13.1116 11.2678 12.6428C11.7366 12.1739 12 11.538 12 10.875ZM6.06253 7.125C6.06253 7.45652 6.19423 7.77446 6.42865 8.00888C6.66307 8.2433 6.98101 8.375 7.31253 8.375H7.62503V5.875H7.31253C6.98101 5.875 6.66307 6.0067 6.42865 6.24112C6.19423 6.47554 6.06253 6.79348 6.06253 7.125Z" fill="#202020"/>
                        </svg>
                      </label>
                      <select ref="priceDropdownRef" id="priceDropdown" v-model="selectedPriceRange" class="me-5 form-select select2 custom-select2-dropdown" :disabled="isEmpty">
                        <option value="">{{$t('landingpage.all_price')}}</option>
                        <option :value="price" v-for="price in priceRanges" :key="price">${{ price }}</option>
                      </select>
                    </div>
                    
                    <!-- availability dropdown -->
                    <div class="input-group custom-dropdown flex-nowrap">
                      <label class="input-group-text" for="providerDropdown">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M4.06723 1.94217L1.56723 4.44217C1.44995 4.55944 1.29089 4.62533 1.12504 4.62533C0.95919 4.62533 0.80013 4.55944 0.682855 4.44217C0.565579 4.32489 0.499695 4.16583 0.499695 3.99998C0.499695 3.83413 0.565579 3.67507 0.682855 3.55779L3.18285 1.05779C3.30013 0.940518 3.45919 0.874634 3.62504 0.874634C3.79089 0.874634 3.94995 0.940518 4.06723 1.05779C4.18451 1.17507 4.25039 1.33413 4.25039 1.49998C4.25039 1.66583 4.18451 1.82489 4.06723 1.94217ZM17.8172 3.55779L15.3172 1.05779C15.2 0.940518 15.0409 0.874634 14.875 0.874634C14.7092 0.874634 14.5501 0.940518 14.4329 1.05779C14.3156 1.17507 14.2497 1.33413 14.2497 1.49998C14.2497 1.66583 14.3156 1.82489 14.4329 1.94217L16.9329 4.44217C16.9909 4.50024 17.0599 4.5463 17.1357 4.57773C17.2116 4.60915 17.2929 4.62533 17.375 4.62533C17.4572 4.62533 17.5385 4.60915 17.6144 4.57773C17.6902 4.5463 17.7592 4.50024 17.8172 4.44217C17.8753 4.3841 17.9214 4.31516 17.9528 4.23929C17.9842 4.16342 18.0004 4.0821 18.0004 3.99998C18.0004 3.91786 17.9842 3.83654 17.9528 3.76067C17.9214 3.6848 17.8753 3.61586 17.8172 3.55779ZM16.75 9.62498C16.75 11.1083 16.3102 12.5584 15.4861 13.7918C14.662 15.0251 13.4906 15.9864 12.1202 16.5541C10.7497 17.1217 9.24172 17.2703 7.78687 16.9809C6.33201 16.6915 4.99564 15.9772 3.94674 14.9283C2.89785 13.8794 2.18354 12.543 1.89415 11.0882C1.60476 9.6333 1.75329 8.1253 2.32095 6.75486C2.8886 5.38441 3.8499 4.21307 5.08327 3.38896C6.31663 2.56485 7.76668 2.12498 9.25004 2.12498C11.2385 2.12726 13.1448 2.91816 14.5508 4.32419C15.9569 5.73022 16.7478 7.63656 16.75 9.62498ZM14.25 9.62498C14.25 9.45922 14.1842 9.30025 14.067 9.18304C13.9498 9.06583 13.7908 8.99998 13.625 8.99998H9.87504V5.24998C9.87504 5.08422 9.80919 4.92525 9.69198 4.80804C9.57477 4.69083 9.4158 4.62498 9.25004 4.62498C9.08428 4.62498 8.92531 4.69083 8.8081 4.80804C8.69089 4.92525 8.62504 5.08422 8.62504 5.24998V9.62498C8.62504 9.79074 8.69089 9.94971 8.8081 10.0669C8.92531 10.1841 9.08428 10.25 9.25004 10.25H13.625C13.7908 10.25 13.9498 10.1841 14.067 10.0669C14.1842 9.94971 14.25 9.79074 14.25 9.62498Z" fill="#202020"/>
                        </svg>
                      </label>
                      <select ref="providerDropdownRef" id="providerDropdown" v-model="selectedProvider" class="me-5 form-select select2 custom-select2-dropdown" disabled="true">
                        <option value=""> {{$t('landingpage.availability')}}</option>
                        <option v-for="providers in provider_data" :key="providers.id" :value="providers.id">{{ providers.first_name }}</option>
                      </select>
                    </div>

                    <!-- organization dropdown -->
                    <!-- <div class="input-group custom-dropdown flex-nowrap">
                      <label class="input-group-text" for="providerDropdown">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M4.06723 1.94217L1.56723 4.44217C1.44995 4.55944 1.29089 4.62533 1.12504 4.62533C0.95919 4.62533 0.80013 4.55944 0.682855 4.44217C0.565579 4.32489 0.499695 4.16583 0.499695 3.99998C0.499695 3.83413 0.565579 3.67507 0.682855 3.55779L3.18285 1.05779C3.30013 0.940518 3.45919 0.874634 3.62504 0.874634C3.79089 0.874634 3.94995 0.940518 4.06723 1.05779C4.18451 1.17507 4.25039 1.33413 4.25039 1.49998C4.25039 1.66583 4.18451 1.82489 4.06723 1.94217ZM17.8172 3.55779L15.3172 1.05779C15.2 0.940518 15.0409 0.874634 14.875 0.874634C14.7092 0.874634 14.5501 0.940518 14.4329 1.05779C14.3156 1.17507 14.2497 1.33413 14.2497 1.49998C14.2497 1.66583 14.3156 1.82489 14.4329 1.94217L16.9329 4.44217C16.9909 4.50024 17.0599 4.5463 17.1357 4.57773C17.2116 4.60915 17.2929 4.62533 17.375 4.62533C17.4572 4.62533 17.5385 4.60915 17.6144 4.57773C17.6902 4.5463 17.7592 4.50024 17.8172 4.44217C17.8753 4.3841 17.9214 4.31516 17.9528 4.23929C17.9842 4.16342 18.0004 4.0821 18.0004 3.99998C18.0004 3.91786 17.9842 3.83654 17.9528 3.76067C17.9214 3.6848 17.8753 3.61586 17.8172 3.55779ZM16.75 9.62498C16.75 11.1083 16.3102 12.5584 15.4861 13.7918C14.662 15.0251 13.4906 15.9864 12.1202 16.5541C10.7497 17.1217 9.24172 17.2703 7.78687 16.9809C6.33201 16.6915 4.99564 15.9772 3.94674 14.9283C2.89785 13.8794 2.18354 12.543 1.89415 11.0882C1.60476 9.6333 1.75329 8.1253 2.32095 6.75486C2.8886 5.38441 3.8499 4.21307 5.08327 3.38896C6.31663 2.56485 7.76668 2.12498 9.25004 2.12498C11.2385 2.12726 13.1448 2.91816 14.5508 4.32419C15.9569 5.73022 16.7478 7.63656 16.75 9.62498ZM14.25 9.62498C14.25 9.45922 14.1842 9.30025 14.067 9.18304C13.9498 9.06583 13.7908 8.99998 13.625 8.99998H9.87504V5.24998C9.87504 5.08422 9.80919 4.92525 9.69198 4.80804C9.57477 4.69083 9.4158 4.62498 9.25004 4.62498C9.08428 4.62498 8.92531 4.69083 8.8081 4.80804C8.69089 4.92525 8.62504 5.08422 8.62504 5.24998V9.62498C8.62504 9.79074 8.69089 9.94971 8.8081 10.0669C8.92531 10.1841 9.08428 10.25 9.25004 10.25H13.625C13.7908 10.25 13.9498 10.1841 14.067 10.0669C14.1842 9.94971 14.25 9.79074 14.25 9.62498Z" fill="#202020"/>
                        </svg>
                      </label>
                      <select ref="providerDropdownRef" id="providerDropdown" v-model="selectedProvider" class="me-5 form-select select2 custom-select2-dropdown" :disabled="isEmpty">
                        <option value="">{{$t('landingpage.all_providers')}}</option>
                        <option v-for="providers in provider_data" :key="providers.id" :value="providers.id">{{ providers.first_name }}</option>
                      </select>
                    </div> -->

                    <!-- more filters modal button -->
                    <div class="input-group custom-dropdown moreFiltersButton flex-nowrap"  data-toggle="modal" data-target="#moreFiltersModal">
                      <label class="input-group-text" for="moreFilters">
                        <svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M0.25 2.25C0.25 2.08423 0.315848 1.92526 0.433058 1.80805C0.550269 1.69084 0.70924 1.625 0.875 1.625H3.77891C3.91362 1.17372 4.19038 0.77798 4.56803 0.496601C4.94568 0.215221 5.40405 0.0632324 5.875 0.0632324C6.34595 0.0632324 6.80432 0.215221 7.18197 0.496601C7.55962 0.77798 7.83638 1.17372 7.97109 1.625H14.625C14.7908 1.625 14.9497 1.69084 15.0669 1.80805C15.1842 1.92526 15.25 2.08423 15.25 2.25C15.25 2.41576 15.1842 2.57473 15.0669 2.69194C14.9497 2.80915 14.7908 2.875 14.625 2.875H7.97109C7.83638 3.32627 7.55962 3.72201 7.18197 4.00339C6.80432 4.28477 6.34595 4.43676 5.875 4.43676C5.40405 4.43676 4.94568 4.28477 4.56803 4.00339C4.19038 3.72201 3.91362 3.32627 3.77891 2.875H0.875C0.70924 2.875 0.550269 2.80915 0.433058 2.69194C0.315848 2.57473 0.25 2.41576 0.25 2.25ZM14.625 9.125H12.9711C12.8364 8.67373 12.5596 8.27798 12.182 7.9966C11.8043 7.71522 11.3459 7.56323 10.875 7.56323C10.4041 7.56323 9.94568 7.71522 9.56803 7.9966C9.19038 8.27798 8.91362 8.67373 8.77891 9.125H0.875C0.70924 9.125 0.550269 9.19084 0.433058 9.30805C0.315848 9.42526 0.25 9.58424 0.25 9.75C0.25 9.91576 0.315848 10.0747 0.433058 10.1919C0.550269 10.3091 0.70924 10.375 0.875 10.375H8.77891C8.91362 10.8263 9.19038 11.222 9.56803 11.5034C9.94568 11.7848 10.4041 11.9368 10.875 11.9368C11.3459 11.9368 11.8043 11.7848 12.182 11.5034C12.5596 11.222 12.8364 10.8263 12.9711 10.375H14.625C14.7908 10.375 14.9497 10.3091 15.0669 10.1919C15.1842 10.0747 15.25 9.91576 15.25 9.75C15.25 9.58424 15.1842 9.42526 15.0669 9.30805C14.9497 9.19084 14.7908 9.125 14.625 9.125Z" fill="#202020"/>
                        </svg>
                      </label>
                      <span id="moreFilters">
                        {{$t('landingpage.more_filter')}}
                      </span>
                    </div>
                </div>
              </div>

              <!-- count and sorting section -->
              <div class="count-sorting-container">
                  <span>
                    <span class="services-count">{{totalRecords}}</span> {{$t('landingpage.results_found')}}
                  </span>
                  <div class="d-flex align-items-center">
                    <span class="sorting-title">{{$t('landingpage.sort_by')}}</span>
                    <div class="custom-dropdown">
                      <select ref="sortOptionRef" v-model="selectedSortOption" class="me-5 form-select select2 custom-select2-dropdown" :disabled="isEmpty">
                        <option value="">{{$t('landingpage.select')}}</option>
                        <option value="best_selling">{{$t('landingpage.best_selling')}}</option>
                        <option value="top_rated">{{$t('landingpage.top_rated')}}</option>
                        <option value="newest">{{$t('landingpage.newest')}}</option>
                      </select>
                    </div>
                  </div>
                  <!-- <button v-if="checkDropdowns" class="btn btn-outline-primary" @click="refreshDropdowns" :disabled="isEmpty">{{$t('landingpage.reset')}}</button> -->
              </div>

              <!-- services card -->
              <div class="table-responsive rounded services-datatable">
                <table id="datatable" ref="tableRef" class="table custom-card-table service-card-table"></table>
              </div>
        
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="moreFiltersModal" tabindex="-1" role="dialog" aria-labelledby="moreFiltersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="moreFiltersModalLabel">
                <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0 3.5C0 3.30109 0.0790178 3.11032 0.21967 2.96967C0.360322 2.82902 0.551088 2.75 0.75 2.75H4.23469C4.39635 2.20848 4.72845 1.73358 5.18163 1.39593C5.63481 1.05827 6.18486 0.875885 6.75 0.875885C7.31514 0.875885 7.86519 1.05827 8.31837 1.39593C8.77155 1.73358 9.10365 2.20848 9.26531 2.75H17.25C17.4489 2.75 17.6397 2.82902 17.7803 2.96967C17.921 3.11032 18 3.30109 18 3.5C18 3.69891 17.921 3.88968 17.7803 4.03033C17.6397 4.17098 17.4489 4.25 17.25 4.25H9.26531C9.10365 4.79152 8.77155 5.26642 8.31837 5.60407C7.86519 5.94173 7.31514 6.12411 6.75 6.12411C6.18486 6.12411 5.63481 5.94173 5.18163 5.60407C4.72845 5.26642 4.39635 4.79152 4.23469 4.25H0.75C0.551088 4.25 0.360322 4.17098 0.21967 4.03033C0.0790178 3.88968 0 3.69891 0 3.5ZM17.25 11.75H15.2653C15.1037 11.2085 14.7715 10.7336 14.3184 10.3959C13.8652 10.0583 13.3151 9.87589 12.75 9.87589C12.1849 9.87589 11.6348 10.0583 11.1816 10.3959C10.7285 10.7336 10.3963 11.2085 10.2347 11.75H0.75C0.551088 11.75 0.360322 11.829 0.21967 11.9697C0.0790178 12.1103 0 12.3011 0 12.5C0 12.6989 0.0790178 12.8897 0.21967 13.0303C0.360322 13.171 0.551088 13.25 0.75 13.25H10.2347C10.3963 13.7915 10.7285 14.2664 11.1816 14.6041C11.6348 14.9417 12.1849 15.1241 12.75 15.1241C13.3151 15.1241 13.8652 14.9417 14.3184 14.6041C14.7715 14.2664 15.1037 13.7915 15.2653 13.25H17.25C17.4489 13.25 17.6397 13.171 17.7803 13.0303C17.921 12.8897 18 12.6989 18 12.5C18 12.3011 17.921 12.1103 17.7803 11.9697C17.6397 11.829 17.4489 11.75 17.25 11.75Z" fill="#202020"/>
                </svg>
                <span>
                  {{$t('landingpage.more_filter')}}
                </span>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.2807 14.2194C15.3504 14.2891 15.4056 14.3718 15.4433 14.4628C15.4811 14.5539 15.5005 14.6515 15.5005 14.75C15.5005 14.8485 15.4811 14.9461 15.4433 15.0372C15.4056 15.1282 15.3504 15.2109 15.2807 15.2806C15.211 15.3503 15.1283 15.4056 15.0372 15.4433C14.9462 15.481 14.8486 15.5004 14.7501 15.5004C14.6515 15.5004 14.5539 15.481 14.4629 15.4433C14.3718 15.4056 14.2891 15.3503 14.2194 15.2806L8.00005 9.06031L1.78068 15.2806C1.63995 15.4214 1.44907 15.5004 1.25005 15.5004C1.05103 15.5004 0.860156 15.4214 0.719426 15.2806C0.578695 15.1399 0.499634 14.949 0.499634 14.75C0.499634 14.551 0.578695 14.3601 0.719426 14.2194L6.93974 8L0.719426 1.78062C0.578695 1.63989 0.499634 1.44902 0.499634 1.25C0.499634 1.05097 0.578695 0.860103 0.719426 0.719372C0.860156 0.578642 1.05103 0.49958 1.25005 0.49958C1.44907 0.49958 1.63995 0.578642 1.78068 0.719372L8.00005 6.93968L14.2194 0.719372C14.3602 0.578642 14.551 0.49958 14.7501 0.49958C14.9491 0.49958 15.1399 0.578642 15.2807 0.719372C15.4214 0.860103 15.5005 1.05097 15.5005 1.25C15.5005 1.44902 15.4214 1.63989 15.2807 1.78062L9.06036 8L15.2807 14.2194Z" fill="black"/>
                </svg>
                <!-- <span aria-hidden="true">&times;</span> -->
              </button>
            </div>
            <div class="modal-body">
              <div class="row modal-dropdown-row">

                <div class="col-lg-12 modal-filter-col">
                  <p class="modal-filter-title">
                    {{$t('placeholder.choose_a_service_provider')}}
                  </p>
                  <div class="input-group custom-dropdown modal-custom-dropdown flex-nowrap">
                    <select ref="providerDropdownRef" id="modalProviderDropdown" v-model="selectedProvider" class="me-5 form-select select2 custom-select2-dropdown">
                      <option value=""> {{$t('landingpage.select')}} </option>
                      <option v-for="providers in provider_data" :key="providers.id" :value="providers.id">{{ providers.first_name }}</option>
                    </select>
                  </div>
                </div>

                <div class="col-lg-12 modal-filter-col">
                  <p class="modal-filter-title">
                    {{$t('placeholder.choose_language')}}
                  </p>
                  <div class="input-group custom-dropdown modal-custom-dropdown flex-nowrap">
                    <select ref="languageDropdownRef" id="languageDropdown" class="me-5 form-select select2 custom-select2-dropdown">
                      <option value=""> {{$t('placeholder.language_used')}} </option>
                      <option value="english"> English </option>
                      <option value="french"> French </option>
                    </select>
                  </div>
                </div>
                
                <div class="col-lg-12 modal-filter-col">
                  <p class="modal-filter-title">
                    {{$t('placeholder.choose_location')}}
                  </p>
                  <div class="input-group custom-dropdown modal-custom-dropdown flex-nowrap">
                    <select ref="locationDropdownRef" id="locationDropdown" class="me-5 form-select select2 custom-select2-dropdown">
                      <option value=""> {{$t('placeholder.choose_location')}} </option>
                      <option value="USA"> USA </option>
                      <option value="France"> France </option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row modal-footer-row">
                <div class="col-lg-12">
                  <button type="button" class="btn btn-primary apply-button">
                    <span>
                      {{$t('landingpage.apply')}}
                    </span>
                  </button>
                </div>
                <div class="col-lg-12">
                  <button type="button" class="btn btn-default cancel-button" data-dismiss="modal">
                    <span>
                      {{$t('landingpage.cancel')}}
                    </span>
                  </button>
                </div>
    
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </template>

<script setup>
  import BannerImage from '../../../public/images/frontend/services-page/banner.webp';
  import BannerOverlay from '../../../public/images/frontend/services-page/banner-overlay.webp';
  import ServiceCard from '../components/ServiceCard.vue';
  import ServiceShimmer from '../shimmer/ServiceShimmer.vue';
  import { computed, onMounted, ref, watch } from 'vue';
  import { useSection } from '../store/index';
  import { useObserveSection } from '../hooks/Observer';
  import useDataTable from '../hooks/Datatable'

  

  const categoryDropdownRef = ref(null);
  const providerDropdownRef = ref(null);
  const priceDropdownRef = ref(null);
  const sortOptionRef = ref(null);
  const props = defineProps(['link', 'isEmpty', 'service']);

  const isEmpty = props.isEmpty;

  const selectedCategory = ref('')
  watch(() => selectedCategory.value, () => ajaxReload())

  const selectedProvider = ref('')
  watch(() => selectedProvider.value, () => ajaxReload())
  
  const selectedPriceRange = ref('')
  watch(() => selectedPriceRange.value, () => ajaxReload())

  const selectedSortOption = ref('')
  watch(() => selectedSortOption.value, () => ajaxReload())

  const search = ref('')
  watch(() => search.value, () => ajaxReload())

  const columns = ref([
    { data: 'name', title: '', orderable: false, order: 'desc'}
  ]);

  const ajaxReload = () => window.$(tableRef.value).DataTable().ajax.reload(null, false)
  const tableRef = ref(null);

  
const { totalRecords } = useDataTable({
    tableRef: tableRef,
    columns: columns.value,
    url: props.link,
       dom: '<"row align-items-center"><"table-responsive" rt><"row align-items-center" <"col-md-6 page-length-container" l><"col-md-12 custom-pagination-container p-0" p>><"clear">',
    advanceFilter: () => {
    return {
        selectedCategory: selectedCategory.value,
        selectedProvider: selectedProvider.value,
        selectedPriceRange: selectedPriceRange.value,
        selectedSortOption: selectedSortOption.value,
        search: search.value,
    }
  } 
  });


  const store = useSection();
  const service_data = computed(() => store.service_list_data);
  const featured_category_data = computed(() => store.featured_category_list_data);
  const category_data = computed(() => store.categries_list_data.data);
  const provider_data = computed(() => store.provider_list_data);

  const minPrice = computed(() => Math.min(...service_data.value.map(item => item.price)));
  const maxPrice = computed(() => Math.max(...service_data.value.map(item => item.price)));

  const priceRanges = computed(() => {
  const range = maxPrice.value - minPrice.value;
  const step = 10;
  const count = Math.ceil(range / step);

  const ranges = Array.from({ length: count + 1 }, (_, index) => ({
    min: minPrice.value + index * step,
    max: minPrice.value + (index + 1) * step,
  }));

  return ranges.map(range => `${range.min}-${range.max}`);
});
  
  const loadServiceData = () => {
      store.get_service_list({ per_page: 'all' });
    };

  const loadCategoryData = () =>{
    store.get_categries_list({ per_page: 'all' });
  }

  const loadProviderData = () =>{
    store.get_provider_list({ per_page: 'all', user_type: 'provider' });
  }

  const loadFeaturedCategoryData = () => {
    store.get_featured_category_list({ is_featured: 1 });
  };
  const addFocusClass = () => {
    var element = document.getElementById("services-search-container");
    element.classList.add("focused");
  };
  const removeFocusClass = () => {
    var element = document.getElementById("services-search-container");
    element.classList.remove("focused");
  };
  
  onMounted(() => {
    $(categoryDropdownRef.value).select2();
    $(providerDropdownRef.value).select2();
    $(priceDropdownRef.value).select2();
    $(sortOptionRef.value).select2();
    $(categoryDropdownRef.value).on('change', function() {
      selectedCategory.value = $(this).val();
    });
    $(providerDropdownRef.value).on('change', function() {
      selectedProvider.value = $(this).val();
    });
    $(priceDropdownRef.value).on('change', function() {
      selectedPriceRange.value = $(this).val();
    });
    $(sortOptionRef.value).on('change', function() {
      selectedSortOption.value = $(this).val();
    });
    loadServiceData();
    loadCategoryData();
    loadProviderData();
    loadFeaturedCategoryData();
  });
  
  const refreshDropdowns = () => {
    $(categoryDropdownRef.value).val('').trigger('change');
    $(providerDropdownRef.value).val('').trigger('change');
    $(priceDropdownRef.value).val('').trigger('change');
    $(sortOptionRef.value).val('').trigger('change');
  }

  const checkDropdowns = computed(() => {
    return selectedCategory.value || selectedProvider.value || selectedPriceRange.value || selectedSortOption.value
  });





  </script>
<style>
/*
.services-custom-container
{
  max-width: 1440px;
}
*/
.services-data-container
{
  max-width: 1200px;
}

.services-main-wrapper
{
  padding-top: 60px;
  padding-bottom: 60px;
}
.filters-container
{
  max-width: 750px;
  margin: auto;
}
.search-box-label label
{
  font-family: 'Open Sans';
  font-size: 16px;
  font-weight: 600;
  line-height: 21.79px;
  text-align: left;
  background-color: transparent;
  color: #000000;
  padding-right: 4px;
}
.services-search
{
  max-width: 550px;
  height: 60px;
  padding: 4px;
  background: #FFFFFF;
  border: 1px solid #E5E5E5;
  border-radius: 40px;
  display: flex;
  margin: auto;
}
.services-search input[type="text"]
{
  border: transparent;
  flex-grow: 1;
  width: 85%;
  margin: 0 15px;
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-size: 16px;
  line-height: 22px;
  color: #686868;
  background: transparent;
  padding-left: 0px;
}
.focused
{
  border: 1px solid #000 !important;
  box-shadow: 5px 5px 20px rgba(0,0,0,0.2) !important;
}



.filters-title
{
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 400;
  font-size: 14px;
  line-height: 19px;
  color: #686868;
  margin-top: 24px;
  text-align: center;
}
.other-filters-dropdowns
{
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.custom-dropdown
{
  width: 185px;
  height: 40px;
  background: #FFFFFF;
  border: 1px solid #E5E5E5;
  border-radius: 13px;
  padding: 9px;
  margin: auto;
  margin-top: 12px;
}
.custom-dropdown .input-group-text
{
  padding: 0px;
  background: transparent;
}

.custom-dropdown .form-select
{
  background: transparent;
}
.custom-dropdown span.select2-selection.select2-selection--single
{
  padding: 0px 0px 0px 10px !important;
  height: 100% !important;
  display: flex;
  justify-content: space-between;
  background-color: transparent !important;
  /* margin-left: 10px; */
}
.custom-dropdown .select2-container--default .select2-selection--single .select2-selection__rendered
{
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 19px;
  color: #202020 !important;
}
.custom-dropdown .select2-container.select2-container--default .select2-selection--single .select2-selection__arrow
{
  right: 0px !important;
}
.moreFiltersButton
{
  width: 148px;
  cursor: pointer;
}
#moreFilters
{
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 19px;
  color: #202020;
  margin-left: 10px;
}
.count-sorting-container 
{
  padding-top: 60px;
  padding-bottom: 16px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
}
.count-sorting-container span
{
  font-family: 'Rubik';
  font-style: normal;
  font-weight: 700;
  font-size: 20px;
  line-height: 24px;
  color: #000000;
}
.count-sorting-container span.sorting-title
{
  width: 80px;
  font-family: 'Rubik';
  font-style: normal;
  font-weight: 700;
  font-size: 16px;
  line-height: 19px;
  color: #000000;
  padding-right: 12px;
}
.count-sorting-container .custom-dropdown
{
  margin: 0px;
  height: auto;
}
#moreFiltersModal .modal-content
{
  border-radius: 24px;
}
#moreFiltersModal .modal-header
{
  padding-top: 26px;
  padding-bottom: 26px;
}
#moreFiltersModal .close
{
  width: 24px;
  height: 24px;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: transparent;
  border: none;
}
#moreFiltersModal .modal-title
{
  line-height: initial;
}
#moreFiltersModal .modal-title span
{
  font-family: 'Rubik';
  font-style: normal;
  font-weight: 600;
  font-size: 18px;
  line-height: 21px;
  color: #202020;
  padding-left: 8px;
}
#moreFiltersModal .modal-body
{
  padding: 0px;
}
#moreFiltersModal .modal-body .modal-dropdown-row
{
  padding: 34px 18px;
}
#moreFiltersModal .modal-body .modal-footer-row
{
  padding-left: 18px;
  padding-right: 18px;
  padding-bottom: 18px;
}

.modal-filter-col
{
  margin-bottom: 24px;
}
.modal-filter-title
{
  font-family: 'Rubik';
  font-style: normal;
  font-weight: 600;
  font-size: 16px;
  line-height: 19px;
  color: #000000;
  margin-bottom: 12px;
}
.modal-custom-dropdown
{
  width: 100%;
}
#moreFiltersModal .modal-footer
{
  padding-top: 0;
  border-top: none;
  display: flex;
  flex-direction: column;
}
#moreFiltersModal .apply-button
{
  width: 100%;
  height: 50px;
  background: #202020;
  border-radius: 13px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 8px;
}
#moreFiltersModal .apply-button span
{
  font-family: 'Rubik';
  font-style: normal;
  font-weight: 700;
  font-size: 16px;
  line-height: 19px;
  color: #FFFFFF;
}

#moreFiltersModal .cancel-button
{
  width: 100%;
  height: 50px;
  border: solid 1px #202020;
  border-radius: 13px;
  display: flex;
  justify-content: center;
  align-items: center;
}
#moreFiltersModal .cancel-button span
{
  font-family: 'Rubik';
  font-style: normal;
  font-weight: 500;
  font-size: 16px;
  line-height: 19px;
  color: #686868;
}
.select2-container.select2-container--open .select2-selection--single
{
  border-color: transparent !important;
}
/*.select2-container.select2-container--default.select2-container--open
{
  margin-top: 0.7%;
  margin-left: -1.6%
}*/
.select2-dropdown
{
  border: none;
/*  width: 180px !important;*/
}
@media (max-width: 734px) {
  .moreFiltersButton
  {
    width: 185px;
  }
}


</style>