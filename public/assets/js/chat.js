$(function() {
    'use strict';

    // تهيئة LightSlider
    const chatActiveContacts = $('#chatActiveContacts');
    if (chatActiveContacts.length) {
        chatActiveContacts.lightSlider({
            autoWidth: true,
            controls: false,
            pager: false,
            slideMargin: 12
        });
    } else {
        console.error('#chatActiveContacts not found');
    }

    // تهيئة PerfectScrollbar للعناصر #ChatList و #ChatBody
    if (window.matchMedia('(min-width: 992px)').matches) {
        const chatList = document.querySelector('#ChatList');
        const chatBody = document.querySelector('#ChatBody');

        if (chatList) {
            new PerfectScrollbar(chatList, {
                suppressScrollX: true
            });
        } else {
            console.error('#ChatList not found');
        }

        if (chatBody) {
            const ChatBody = new PerfectScrollbar(chatBody, {
                suppressScrollX: true
            });
            chatBody.scrollTop = chatBody.scrollHeight;
        } else {
            console.error('#ChatBody not found');
        }
    }

    // التفاعل مع قائمة الدردشة
    $('.main-chat-list .media').on('click touch', function() {
        $(this).addClass('selected').removeClass('new');
        $(this).siblings().removeClass('selected');

        if (window.matchMedia('(max-width: 991px)').matches) {
            $('body').addClass('main-content-body-show');
            $('html, body').scrollTop($('html, body').prop('scrollHeight'));
        }
    });

    // تهيئة التلميحات (Tooltips)
    const tooltips = $('[data-toggle="tooltip"]');
    if (tooltips.length) {
        tooltips.tooltip();
    } else {
        console.warn('No tooltips found with [data-toggle="tooltip"]');
    }

    // إخفاء نافذة الدردشة عند النقر على #ChatBodyHide
    $('#ChatBodyHide').on('click touch', function(e) {
        e.preventDefault();
        $('body').removeClass('main-content-body-show');
    });
});
