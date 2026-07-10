(function ($) {
  var BootstrapIconField = acf.Field.extend({
    type: "bootstrap_icon",

    $control: function () {
      return this.$(".acf-bootstrap-icon");
    },

    initialize: function () {
      var select = this.$control();

      select.select2({
        width: "100%",

        escapeMarkup: function (m) {
          return m;
        },

        templateResult: function (data) {
          if (!data.id) return data.text;

          return $(
            '<span><i class="bi bi-' +
              data.id +
              '" style="margin-right:8px;font-size:20px"></i>' +
              data.text +
              "</span>",
          );
        },

        templateSelection: function (data) {
          if (!data.id) return data.text;

          return $(
            '<span><i class="bi bi-' +
              data.id +
              '" style="margin-right:8px;font-size:20px"></i>' +
              data.text +
              "</span>",
          );
        },
      });
    },
  });

  acf.registerFieldType(BootstrapIconField);
})(jQuery);
