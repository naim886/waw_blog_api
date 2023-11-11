$('.waw-dropdown-container').on('click', function () {
    $(this).children('.waw-dropdown').slideToggle()
    $(this).children('a').children('.waw-menu-item-right-icon').toggleClass('fa-chevron-up fa-chevron-down')
    $(this).siblings('.waw-dropdown-container').children('.waw-dropdown').slideUp()
    $(this).siblings('.waw-dropdown-container').children('a').children('.waw-menu-item-right-icon').toggleClass('fa-chevron-down fa-chevron-up')
})

$('.waw-menu').children('.active').children('.waw-dropdown').slideToggle()
$('.waw-menu').children('.active').children('a').children('.waw-menu-item-right-icon').toggleClass('fa-chevron-down fa-chevron-up')

