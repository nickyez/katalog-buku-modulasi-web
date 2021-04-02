const home = $('#home');
const aboutUs = $('#aboutus');
const kategori = $('#kategori');
const blog = $('#blog');
const contactUs = $('#contactus');
if(home.click()){
    home.addClass('active');
    aboutUs.removeClass('active');
    kategori.removeClass('active');
    blog.removeClass('active');
    contactUs.removeClass('active');
}else if(aboutUs.click()){
    home.removeClass('active')
    aboutUs.addClass('active')
    kategori.removeClass('active')
    blog.removeClass('active')
    contactUs.removeClass('active')
}else if(kategori.click()){
    home.removeClass('active')
    aboutUs.removeClass('active')
    kategori.addClass('active')
    blog.removeClass('active')
    contactUs.removeClass('active')
}else if(blog.click()){
    home.removeClass('active')
    aboutUs.removeClass('active')
    kategori.removeClass('active')
    blog.addClass('active')
    contactUs.removeClass('active')
}else if(contactUs.click()){
    home.removeClass('active')
    aboutUs.removeClass('active')
    kategori.removeClass('active')
    blog.removeClass('active')
    contactUs.addClass('active')
}