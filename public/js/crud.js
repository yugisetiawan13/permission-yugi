function ajaxData() {
    $.ajax({
        url: '/siswa',
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
            $('#t_siswa tbody').html(`
            <tr>
                <td colspan="4" class="text-center">
                    <h4>Loading..</h4>
                </td >
            </tr>
            `)
        },
        success: function(res) {
            // console.log(res) //harus dicoba terlebih dahulu
            if (res.results.length === 0) {
                $('#t_siswa tbody').html(`
                <tr>
                <td colspan="4" class="text-center">
                    <h4>Data Not Found</h4>
                </td>
                </tr>`)
            } else {
                // alert(res.message)
                let rowData = res.results.map(v => {
                    return `<tr>
                    <td> ${v.firstname}</td>
                    <td> ${v.lastname}</td>
                    <td> ${v.prodi}</td>
                    <td> ${v.id} </td>
                </tr>
                `
                }).join('')
                $('#t_siswa tbody').html(rowData)
                $('#t_siswa tfoot').html(`
                <tr>
                    <td colspan="4" class="text-right">
                    <b>Total Data : ${res.results.length}</b>
                    </td>
                </tr>`)
            }
        },
        error: function(err) {
            $('#t_siswa tbody').html(`
            <tr>
                <td colspan="4" class="text-center">
                <h4 class="text-danger">Internal Server Error!</h4>
                </td>
            </tr>`)
        },
        complete: function() {

        }
    })
}

$(function() {
    ajaxData()

    $('#btn_reload').on('click', function() {
        ajaxData()
    })

    $('#btn_add').on('click', function() {
        $('#form_add')[0].reset()
        $('#modal_add').modal('show')
    })
    $('#form_add').validate({
        submitHandler: function(form) {
            $.ajax({
                url: '/siswa/store',
                type: 'POST',
                data: $(form).serialize(),
                success: function(res) {
                    alert(res.message)
                    ajaxData()
                    $('#modal_add').modal('hide')
                },
                error: function(err) {

                },
                complete: function() {

                }
            })
        }

    })
})
