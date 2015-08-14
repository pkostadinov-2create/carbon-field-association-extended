window.carbon = window.carbon || {};

(function($) {
	var carbon = window.carbon;

	if (typeof carbon.fields === 'undefined') {
		return false;
	}

	/*--------------------------------------------------------------------------
	 * ASSOCIATIONExtended
	 *------------------------------------------------------------------------*/

	// AssociationExtended MODEL
	carbon.fields.Model.AssociationExtended = carbon.fields.Model.Relationship.extend({
		defaults: {
			classes: 'carbon-Relationship'
		},

		initialize: function() {
			carbon.fields.Model.Relationship.prototype.initialize.apply(this);
		}
	});

	// AssociationExtended VIEW
	carbon.fields.View.AssociationExtended = carbon.fields.View.Relationship.extend({
		// Add the events from the parent view and also include new ones
		events: {
			'click .relationship-left .relationship-list a': 'addItem',
			'click .relationship-right .relationship-list a': 'removeItem',
			'keypress .relationship-left .search-field': 'searchFieldKeyPress',
			'keyup .relationship-left .search-field': 'searchFilter',
			'click a .edit-link': 'editLink'
		},
		
		initialize: function() {
			carbon.fields.View.Relationship.prototype.initialize.apply(this);
		},

		editLink: function(e) {
			var href = $(e.target).data('href')
			console.log(href);
			if ( typeof href != 'undefined' ) {
				e.preventDefault();
				e.stopPropagation();

				window.open($(e.target).data('href'), '_blank');
			};
		},

		buildItemValue: function(id, type, subtype) {
			var sep = ':';
			return type + sep + subtype + sep + id;
		}
	});

}(jQuery));