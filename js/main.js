// Pass Css Vars to Js
const CSS__CLR_ACC = getComputedStyle(document.querySelector(':root')).getPropertyValue('--clr-acc');;
const CSS__CLR_BG_MD = getComputedStyle(document.querySelector(':root')).getPropertyValue('--clr-bg-md');;
const CSS__CLR_BG = getComputedStyle(document.querySelector(':root')).getPropertyValue('--clr-bg');;

// Langauges Meters
var circular_progress_bars = document.querySelectorAll('.circular-progress-bar');
circular_progress_bars.forEach(element => {
    new EasyPieChart(element, {
        'barColor' : CSS__CLR_ACC,
        'trackColor' : CSS__CLR_BG,
        'scaleColor' : false,
        'lineWidth' : 5,
        'size' : 60,
        'animate' : { duration: element.dataset.duration*1000 , enabled: true },
    });
});
// Abdoo Custom i18n
const CURR_LANG = document.documentElement.lang;

let localized_texts = {
    'Custom Themes ..' : 'قوالب حسب الطلب',
    'Custom Plugins ..' : 'إضافات حسب الطلب'
}

function __(text){
    if(CURR_LANG == 'ar'){
        return localized_texts[text];
    }
    return text;
}

var typed = new Typed('#typing-effect', {
    strings: [__('Custom Themes ..','abdoo'), __('Custom Plugins ..','abdoo')],
    typeSpeed: 70,
    backSpeed: 50,
    //smartBackspace: true, // Default value
    loop: true,
});

// Progress Bars
var progress_bars = document.querySelectorAll('meter'); 
progress_bars.forEach(element => {
    element.target_value = element.value;
    element.value = 0;
    var speed = element.target_value/ element.dataset.duration;
    speed = (1/speed) * 1000;
    element.setInterval_timer = setInterval(increase_progress_bars, speed, element);
});

function increase_progress_bars(element){
    element.value = parseInt(element.value) + 1;
    if(element.value == element.target_value){
        clearInterval(element.setInterval_timer)
    }
}

// Number Counters
var number_counters = document.querySelectorAll('.number-counters > .number'); 
number_counters.forEach(element => {
    element.textContent = 0;
    var speed = element.dataset.max / element.dataset.duration;
    speed = (1/speed) * 1000;
    element.setInterval_timer = setInterval(increase_num_counter, speed, element);
});

function increase_num_counter(element){
    element.textContent = parseInt(element.textContent) + 1;
    if(element.textContent == element.dataset.max){
        clearInterval(element.setInterval_timer)
    }
}

// testimonials Slider

let currentSlide = 0;
let loaded = false;
let testimonials_slider = new KeenSlider("#testimonials-slider", {
    slides: {
        perView: 2,
        spacing: 10,
    },
    slideChanged(slider) {
        currentSlide = slider.track.details.rel;
        console.log('CHANGE2: ' + currentSlide );
        updateDots();
    }
},[
slider => {
  slider.on('created', (slider) => {
    loaded = true;
    createDots(slider);
    updateDots();
  })
},
]);

function createDots(testimonials_slider) {
    const dotsContainer = document.createElement("div");
    dotsContainer.classList.add("dots");
    console.dir(testimonials_slider);
    for (let i = 0; i < testimonials_slider.track.details.slides.length; i++) {
        const dot = document.createElement("a");
        dot.classList.add("dot");
        dot.href = "#";
        dot.setAttribute("aria-label", "Slide " + (i + 1));
        dotsContainer.appendChild(dot);
        dot.addEventListener("click", (e) => {
            e.preventDefault();
            console.log('click: ' + currentSlide);
            testimonials_slider.moveToIdx(i);
            document.dispatchEvent(new Event('slideChanged'));
        });
        document.querySelector("#testimonials").appendChild(dotsContainer);
    }
}

function updateDots() {
    const dots = document.querySelectorAll(".dot");
    dots.forEach((dot, idx) => {
    if (currentSlide === idx) {
        dot.classList.add("active");
    } else {
        dot.classList.remove("active");
    }
    });
}
/* =============== Reponsive =============== */
// Create a condition that targets viewports at less than 768px wide
const mediaQuery = window.matchMedia('(max-width: 768px)')

function handleTabletChange(e) {

  // The Default
  testimonials_slider.options.slides.perView = 2;
  testimonials_slider.update();
  // Check if the media query is true
  if (e.matches) {
    // Then log the following message to the console
    main_js_for_md();
  }

}

// Register event listener
mediaQuery.addListener(handleTabletChange)

// Initial check
handleTabletChange(mediaQuery);

function main_js_for_md(){
    console.log('Md (max-width: 768px) View Activated !');
    testimonials_slider.options.slides.perView = 1;
    testimonials_slider.update();
}

aside = document.querySelector('aside');
// toggle_aside_button = document.querySelector('.aside-toggler');
// toggle_aside_button.addEventListener('click', toggle_aside);

function toggle_aside(){
    aside.dataset.on= (aside.dataset.on === 'true') ? 'false' : 'true';
}


/* =============== Load More Ajax =============== */
var loadmore_buttons = document.querySelectorAll('button.load-more'); 
loadmore_buttons.forEach(element => {
    element.addEventListener('click', load_more_posts);
    element.dataset.page = 1;
});

function load_more_posts(event){
    var button = event.target;
    button.dataset.page = parseInt(button.dataset.page) + 1 ;
    var data = {
        action: 'abdoo_view_portfolio', // Todo: Make Dynamic for any post type
        page: button.dataset.page,
        post_type: button.dataset.posttype,
    };
    button.style.pointerEvents = 'none';
    button.style.opacity = '0.5';

    var xhr = new XMLHttpRequest();
    xhr.open('POST', abdoo_globals.ajaxurl, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = xhr.responseText;
            if(response == '0'){
                button.style.display = 'none';
                return;
            }
            document.querySelector(button.dataset.parentcontainer).insertAdjacentHTML('beforeend', response);
            button.style.pointerEvents = 'initial';
            button.style.opacity = '1';

            // Trigger a custom event
            var event = new CustomEvent('loaded_more_posts');
            document.dispatchEvent(event);
        }
    };
    var params = Object.keys(data).map(function(key) {
        return key + '=' + data[key];
    }).join('&');
    xhr.send(params);
}


// Pop the language switcher for 5s on page load
window.addEventListener('load', function() {
    const langSwitch = document.querySelector('.lang-switch');
    langSwitch.classList.add('hover');
    setTimeout(function() {
        langSwitch.classList.remove('hover');
    }, 5000);
});