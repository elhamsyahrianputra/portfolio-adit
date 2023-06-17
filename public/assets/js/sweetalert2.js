function confirmSubmit(e, name) {
    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        html: "To delete this data? <br> <b>(" + name + ")</b>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            e.submit();
        } else {
            return false;
        }
    });
}