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
var testimonials_slider = new KeenSlider("#testimonials-slider", {
    slides: {
        perView: 2,
        spacing: 10,
    },
})

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
    main_js_for_mobile();
  }

}

// Register event listener
mediaQuery.addListener(handleTabletChange)

// Initial check
handleTabletChange(mediaQuery);

function main_js_for_mobile(){
    console.log('Mobile View Activated !');
    testimonials_slider.options.slides.perView = 1;
    testimonials_slider.update();
}

aside = document.querySelector('aside');
toggle_aside_button = document.querySelector('.aside-toggler');
toggle_aside_button.addEventListener('click', toggle_aside);

function toggle_aside(){
    console.log('click');
    aside.dataset.on= (aside.dataset.on === 'true') ? 'false' : 'true';
}