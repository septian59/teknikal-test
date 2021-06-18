<a href="{{route('player.edit', $model)}}" class="btn btn-warning">Edit</a>
<button href="" class="btn btn-danger" id="delete">Delete</button>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
        title: 'Apakah kamu yakin hapus data ini?',
        text: "Data yang di hapus akan masuk ke recyle !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteForm').action = href;
            document.getElementById('deleteForm').submit();
            Swal.fire(
            'Terhapus!',
            'Data kamu sudah masuk recyle.',
            'success'
            )
        }
        })
      
    })

    
</script>