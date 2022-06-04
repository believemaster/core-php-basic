$("a.delete").on('click', function(e) {
  e.preventDefault();

  if(confirm("Are you sure to delete?")) {
    var form = $("<form>");

    form.attr('method', 'post');
    form.attr('action', $(this).attr('href'));
    form.appendTo("body");
    form.submit();
  }
});
