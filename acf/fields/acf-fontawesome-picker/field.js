(function ($) {
  var FontAwesomeField = acf.Field.extend({
    type: "fontawesome",

    events: {
      "click .acf-fa-open": "togglePicker",
      "click .acf-fa-icon": "selectIcon",
      "keyup .acf-fa-search-input": "searchIcons",
    },
    searchIcons: function (e) {
      var keyword = $(e.currentTarget).val().toLowerCase().trim();

      this.$(".acf-fa-icon").each(function () {
        var item = $(this);

        var icon = item.data("icon").toLowerCase();

        if (icon.indexOf(keyword) !== -1) {
          item.show();
        } else {
          item.hide();
        }
      });
    },

    initialize: function () {
      this.renderIcons();
    },

    renderIcons: function () {
      var container = this.$(".acf-fa-icons");

      container.empty();

      if (
        typeof acfFaPicker === "undefined" ||
        !acfFaPicker.icons ||
        !acfFaPicker.icons.length
      ) {
        container.html('<div class="acf-fa-empty">هیچ آیکونی پیدا نشد.</div>');

        return;
      }

      var current = this.$(".acf-fa-value").val();

      $.each(acfFaPicker.icons, function (index, icon) {
        var active = current === icon ? " active" : "";

        container.append(
          '<div class="acf-fa-icon' +
            active +
            '" ' +
            'data-icon="' +
            icon +
            '" ' +
            'title="' +
            icon +
            '">' +
            '<i class="fa fa-' +
            icon +
            '"></i>' +
            "</div>",
        );
      });
    },

    togglePicker: function (e) {
      e.preventDefault();

      var dropdown = this.$(".acf-fa-dropdown");

      $(".acf-fa-dropdown").not(dropdown).slideUp(120);

      dropdown.slideToggle(150);

      this.$(".acf-fa-search-input").focus();
    },

    selectIcon: function (e) {
      e.preventDefault();

      var item = $(e.currentTarget);

      var icon = item.data("icon");

      this.$(".acf-fa-value").val(icon).trigger("change");

      this.$(".acf-fa-preview").html(
        '<i class="fa fa-' + icon + '"></i>' + "<span>" + icon + "</span>",
      );

      this.$(".acf-fa-icon").removeClass("active");

      item.addClass("active");

      this.$(".acf-fa-dropdown").slideUp(150);
    },
  });

  acf.registerFieldType(FontAwesomeField);
})(jQuery);
