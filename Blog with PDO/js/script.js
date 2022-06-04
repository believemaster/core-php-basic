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

$.validator.addMethod("dateTime", function(value, element) {
  return (value== "") || isNaN(Date.parse(value));
}, "Must be a valid date and time");

$('#formArticle').validate({
  rules: {
    title: {
      required: true
    },
    content: {
      required: true
    },
    published_at: {
      dateTime: true
    }
  }
});