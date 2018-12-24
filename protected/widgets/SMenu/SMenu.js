$(function(){
    $('ul.toolbar li.dropDown').mouseover(function(){
        $(this).addClass('opened');
        $(this).find('ul').show();
    }).mouseleave(function(){
        $(this).removeClass('opened');
        $(this).find('ul').hide();
    });
    
    $('ul.toolbar li ul li').click(function(e){
        location.href = $(this).find('a').attr('href');
    });	
	
    $('ul.menuDropDown li.clickable').click(function(){
        $(this).find('div.title').toggleClass('opened');
        $(this).find('ul').toggle('fast');
    });

    $('ul.menuDropDown li:not(.clickable)').click(function(){
        location.href = $(this).find('a').attr('href');
    });
    
    $('li.preopen').find('div.title').toggleClass('opened');
    $('.preopen').find('ul').toggle('fast');
});