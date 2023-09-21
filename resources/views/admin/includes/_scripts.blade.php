<!--begin::Javascript-->
<script>var hostUrl = "{{ asset('assets/') }}";</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--end::Javascript-->

{{-- Axios --}}
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

{{-- CRUD  --}}
<script src="{{ asset('assets/crud.js') }}"></script>

{{-- SWEETALERT --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

{{-- FontAwesome --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- DataTables JS --}}
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>




<script>
    // الحصول على وقت المستخدم
    var userTime = new Date();

    // تنسيق الوقت بصيغة 12 ساعة
    function formatTime(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // إذا كانت الساعة 0، قم بتعيينها إلى 12
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        var formattedTime = hours + ':' + minutes + ':' + seconds ;
        return formattedTime;
    }

    function formatampm(date) {
        var hours = date.getHours();
        var ampm = hours >= 12 ? 'PM' : 'AM';

        return ampm;
    }

    // عرض الوقت بصيغة 12 ساعة
    function displayTime() {
        var clockElement = document.getElementById('clock');
        clockElement.innerHTML = formatTime(userTime);

        var ampmElement = document.getElementById('ampm');
        ampmElement.innerHTML = formatampm(userTime);
    }

    // تحديث الوقت كل ثانية
    setInterval(function() {
        userTime = new Date(); // تحديث وقت المستخدم
        displayTime();
    }, 1000);

    // عرض الوقت الأولي
    displayTime();
</script>

{{-- <script>
    // تعيين وقت انتهاء الجلسة بالمللي ثانية (15 دقيقة)
    var sessionTimeout = 15 * 60 * 1000; // 15 minutes in milliseconds

    // إعادة تعيين المؤقت إذا تم تحديث الصفحة
    var timeoutId = setTimeout(logout, sessionTimeout);


    // تنفيذ تسجيل الخروج عند انتهاء المؤقت
    function logout() {
        // هنا يمكنك إجراء تسجيل الخروج، مثل إرسال طلب إلى الخادم لتسجيل الخروج
        window.location.href = '/admin/logout'; // مثال على توجيه المستخدم لصفحة تسجيل الخروج
    }

    // إعادة تعيين المؤقت إذا تم تحديث الصفحة
    document.addEventListener('mousemove', function () {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(logout, sessionTimeout);
    });

    // إعادة تعيين المؤقت إذا تم النقر على أي عنصر بالصفحة
    document.addEventListener('click', function () {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(logout, sessionTimeout);
    });
</script> --}}



@stack('javascript')
