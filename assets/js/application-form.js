(function ($) {
  var DEFAULT_OPTIONS = {
    jobFieldName: 'job-id',
    jobId: null
  };

  function ApplicationForm (element, options) {
    this.$element = $(element);
    this.options = $.extend({}, DEFAULT_OPTIONS, options);
    this.bind();
  }

  ApplicationForm.prototype.bind = function () {
    this.$element.find(this.options.jobFieldName).val(this.options.jobId);
  };

  $.fn.applicationForm = function (options) {
    return this.each(function () {
      return $(this).data('applicationForm', new ApplicationForm(this, options || {}));
    });
  };
}).call(this, jQuery);
