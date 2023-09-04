$('.number').number(true);

$('input.number').on('bulr', function() {
  let value = $(this).val();
  Number(value).toLocaleString();
});