var templates = [];

function addField(type) {
  var form = $(templates[type]).clone(true);
  form.appendTo('#' + type);
}

function removeField(element) {
  $(element).parents('.item-row:first').remove();
}

function createTemplates() {
  $('.repeat-form').each( function(i) {
    var form = $('.item-row:first', this).clone(true);
    $(':input', form).val('');
    templates[this.id] = form;
  });
}

function numerateRows() {
  $('.repeat-form').each( function() {
    $('.item-row', this).each( function(i) {
      $(':input', this).each( function() {
        this.name = this.name.replace(/\[\d*\]/gm, '[' + i + ']');
        this.id = this.id.replace(/_\d*_/gm, '_' + i + '_');
      });
    });
  });
}

$(function() {
  createTemplates();
  $('form').bind('submit', numerateRows);
});
