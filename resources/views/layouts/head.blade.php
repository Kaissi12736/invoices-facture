<!-- Title -->
<title> @yield("title") </title>
<title> Valex -  Premium dashboard ui bootstrap rwd admin html5 template </title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
@yield('css')
<!--- Style css -->
<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
<button id="theme-toggle" class="btn btn-primary">
    تبديل الوضع
</button>

<script>
    const themeToggle = document.getElementById("theme-toggle");
    const themeLink = document.getElementById("theme");

    themeToggle.addEventListener("click", () => {
        let currentTheme = localStorage.getItem("theme") || "light";

        if (currentTheme === "light") {
            themeLink.href = "{{URL::asset('assets/css-rtl/style-dark.css')}}";
            localStorage.setItem("theme", "dark");
            document.body.classList.add("dark-mode");
        } else {
            themeLink.href = "{{URL::asset('assets/css-rtl/style.css')}}";
            localStorage.setItem("theme", "light");
            document.body.classList.remove("dark-mode");
        }
    });
</script>