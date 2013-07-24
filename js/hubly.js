//$(document).foundation();
$(document).foundation('alerts orbit', {
  timer_speed: 5000,
  pause_on_hover: true,
  resume_on_mouseout: true,
  //animation_speed: 500,
  bullets: false,
  stack_on_small: false,
  //container_class: 'orbit-container',
  //stack_on_small_class: 'orbit-stack-on-small',
  //next_class: 'orbit-next',
  //prev_class: 'orbit-prev',
  timer_container_class: 'orbit-timer',
  //timer_paused_class: 'paused',
  //timer_progress_class: 'orbit-progress',
  //slides_container_class: 'orbit-slides-container',
  //bullets_container_class: 'orbit-bullets',
  //bullets_active_class: 'active',
  slide_number_class: 'orbit-slide-number hide',
  //caption_class: 'orbit-caption',
  //active_slide_class: 'active',
  //orbit_transition_class: 'orbit-transitioning'
}, function(response){if(response.errors.length > 0)console.log(response.errors)});