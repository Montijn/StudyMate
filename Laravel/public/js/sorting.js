window.onload = function () {
    document.getElementById('sortdropdown').addEventListener('change', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log('check');
        let sort = this.value;
        $.ajax({
            url: '/sort',
            data: {sort: sort},
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                if (data.success == true) {
                    $('#deadlines').html(data.html);
                }
            }
        })
    });
};
console.log('test');
