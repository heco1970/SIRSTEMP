function createDynatable(id, ajaxUrl, sorts, writers = {}) {

  var tableSel = $(id);
  var buttonSel = $(id + "-filter");
  var divSel = $(id + "-div");

  var dynatable = tableSel.dynatable({
    inputs: {
        queries: $(id + "-search :input")
    },
    dataset: {
        ajax: true,
        ajaxUrl: ajaxUrl,
        ajaxOnLoad: true,
        records: [],
        perPageDefault: 10,
        sorts: sorts
    },
    features: {
      search: false,
    },
    writers: writers
  }).data('dynatable');

  buttonSel.on('click', function(){
    divSel.slideToggle('fast', function(){
      if (!divSel.is(':visible')) {
        divSel.find(':input').val('');
        dynatable.settings.dataset.queries = {};
        dynatable.process();
      }
    });
  });
}
