table_config = {
	data_tables : function(table_id,data,empty_message){

		default_config ={
			aLengthMenu:[ 10, 25, 50, 100, 500, 1000 ],
		}

		if(!empty_message){
			empty_message = 'No data available in table';
		}

		if(data){
			$(data).each(function(i,e){
				$.each(e, function(key,val){
					default_config[key] = val;
				});
			});
		}

		/* Set the defaults for DataTables initialisation */
		$.extend( true, $.fn.dataTable.defaults, {
			"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'p i>>",
			"sPaginationType": "bootstrap",
			"oLanguage": {
				"sLengthMenu": "_MENU_"
			}
		});

		/* Default class modification */
		$.extend( $.fn.dataTableExt.oStdClasses, {
			"sWrapper": "dataTables_wrapper form-inline"
		});

		/* API method to get paging information */
		$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ){
			return {
				"iStart":         oSettings._iDisplayStart,
				"iEnd":           oSettings.fnDisplayEnd(),
				"iLength":        oSettings._iDisplayLength,
				"iTotal":         oSettings.fnRecordsTotal(),
				"iFilteredTotal": oSettings.fnRecordsDisplay(),
				"iPage":          oSettings._iDisplayLength === -1 ?
				0 : Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
				"iTotalPages":    oSettings._iDisplayLength === -1 ?
				0 : Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
			};
		};

		/* Bootstrap style pagination control */
		$.extend( $.fn.dataTableExt.oPagination, {
			"bootstrap": {
				"fnInit": function( oSettings, nPaging, fnDraw ) {
					var oLang = oSettings.oLanguage.oPaginate;
					var fnClickHandler = function ( e ) {
						e.preventDefault();
						if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
							fnDraw( oSettings );
						}
					};

					$(nPaging).addClass('pagination').append(
						'<ul>'+
						'<li class="prev disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>'+
						'<li class="next disabled"><a href="#"><i class="fa fa-chevron-right"></i></a></li>'+
						'</ul>'
						);
					var els = $('a', nPaging);
					$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
					$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
				},

				"fnUpdate": function ( oSettings, fnDraw ) {
					var iListLength = 5;
					var oPaging = oSettings.oInstance.fnPagingInfo();
					var an = oSettings.aanFeatures.p;
					var i, ien, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

					if ( oPaging.iTotalPages < iListLength) {
						iStart = 1;
						iEnd = oPaging.iTotalPages;
					}else if ( oPaging.iPage <= iHalf ) {
						iStart = 1;
						iEnd = iListLength;
					}else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
						iStart = oPaging.iTotalPages - iListLength + 1;
						iEnd = oPaging.iTotalPages;
					}else {
						iStart = oPaging.iPage - iHalf + 1;
						iEnd = iStart + iListLength - 1;
					}

					for ( i=0, ien=an.length ; i<ien ; i++ ) {
						// Remove the middle elements
						$('li:gt(0)', an[i]).filter(':not(:last)').remove();

							// Add the new list items and their event handlers
							for ( j=iStart ; j<=iEnd ; j++ ) {
								sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
								$('<li '+sClass+'><a href="#">'+j+'</a></li>')
								.insertBefore( $('li:last', an[i])[0] )
								.bind('click', function (e) {
									e.preventDefault();
									oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
									fnDraw( oSettings );
								});
							}
						}
					}
				}
			});

		/* Table initialisation */
		var responsiveHelper = undefined;
		var breakpointDefinition = {
			tablet: 1024,
			phone : 480
		};
		var tableElement = $(table_id);

		tableElement.dataTable({
			"sDom": "<'row'<'col-md-6'l T><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
			"sPaginationType": "bootstrap",
			"aaSorting": [[0,'desc']],
			"aoColumnDefs": [
				// { 'bSortable': false, 'aTargets': [ 0 ] }
				],
				"oLanguage": {
					"sLengthMenu": "_MENU_ ",
					"sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries",
					"sEmptyTable": empty_message
				},
				bAutoWidth     : false,
				"bDestroy": true,
				"aLengthMenu": default_config.aLengthMenu,
				fnPreDrawCallback: function () {
    		// Initialize the responsive datatables helper once.
    		if (!responsiveHelper) {
    			responsiveHelper = new ResponsiveDatatablesHelper(tableElement, breakpointDefinition);
    		}
    	},
    	fnRowCallback  : function (nRow) {
    		responsiveHelper.createExpandIcon(nRow);
    	},
    	fnDrawCallback : function (oSettings) {
    		responsiveHelper.respond();
    	}
    });

		$('select[name="example_length"]').select2({
			minimumResultsForSearch: -1,
			tabindex: -1
		});
	}
}