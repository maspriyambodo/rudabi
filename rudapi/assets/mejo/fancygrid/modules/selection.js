/*
 * @class Fancy.grid.plugin.Selection
 * @extends Fancy.Plugin
 */
(function(){
  //SHORTCUTS
  var F = Fancy;

  /*
   * CONSTANTS
   */
  var FIELD_CHECKBOX_CLS = F.FIELD_CHECKBOX_CLS;
  var GRID_CELL_CLS = F.GRID_CELL_CLS;
  var GRID_CELL_OVER_CLS = F.GRID_CELL_OVER_CLS;
  var GRID_CELL_SELECTED_CLS = F.GRID_CELL_SELECTED_CLS;
  var GRID_COLUMN_CLS = F.GRID_COLUMN_CLS;
  var GRID_COLUMN_OVER_CLS = F.GRID_COLUMN_OVER_CLS;
  var GRID_COLUMN_SELECT_CLS = F.GRID_COLUMN_SELECT_CLS;
  var GRID_COLUMN_SELECTED_CLS = F.GRID_COLUMN_SELECTED_CLS;
  var GRID_ROW_OVER_CLS = F.GRID_ROW_OVER_CLS;
  var GRID_HEADER_CELL_SELECT_CLS = F.GRID_HEADER_CELL_SELECT_CLS;

  F.define('Fancy.grid.plugin.Selection', {
    extend: F.Plugin,
    ptype: 'grid.selection',
    inWidgetName: 'selection',
    mixins: [
      'Fancy.grid.selection.mixin.Navigation'
    ],
    enabled: true,
    checkboxRow: false,
    checkOnly: false,
    memory: false,
    /*
     * @constructor
     * @param {Object} config
     */
    constructor: function (config) {
      this.Super('const', arguments);
    },
    /*
     *
     */
    init: function () {
      var me = this;

      me.Super('init', arguments);

      if (me.memory) {
        me.initMemory();
      }

      me.ons();
    },
    /*
     *
     */
    ons: function () {
      var me = this,
        w = me.widget;

      w.once('render', function () {
        me.initTrackOver();
        me.initColumnTrackOver();
        me.initCellTrackOver();
        me.initCellSelection();
        me.initRowSelection();
        me.initColumnSelection();
        if (w.keyNavigation) {
          me.initNavigation();
        }
        w.on('changepage', me.onChangePage, me);

        if(F.nojQuery){
          me.initFixTrackOver();
        }
      });

      w.on('sort', me.onSort, me);

      w.on('columndrag', me.onColumnDrag, me);
      w.on('lockcolumn', me.onColumnLock, me);
      w.on('rightlockcolumn', me.onColumnRightLock, me);
      w.on('unlockcolumn', me.onUnColumnLock, me);
    },
    /*
     *
     */
    initMemory: function () {
      var me = this;

      me.memory = {
        all: false,
        except: {},
        selected: {},
        setAll: function () {
          F.apply(me.memory, {
            all: true,
            except: {},
            selected: {}
          });
        },
        clearAll: function () {
          F.apply(me.memory, {
            all: false,
            except: {},
            selected: {}
          });
        }
      };
    },
    /*
     *
     */
    initTrackOver: function () {
      var me = this,
        w = me.widget;

      w.on('rowenter', me.onRowEnter, me);
      w.on('rowleave', me.onRowLeave, me);
    },
    /*
     *
     */
    initCellTrackOver: function () {
      var me = this,
        w = me.widget;

      w.on('cellenter', me.onCellEnter, me);
      w.on('cellleave', me.onCellLeave, me);
    },
    /*
     *
     */
    initColumnTrackOver: function () {
      var me = this,
        w = me.widget;

      w.on('columnenter', me.onColumnEnter, me);
      w.on('columnleave', me.onColumnLeave, me);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onCellEnter: function (grid, params) {
      var w = this.widget;

      if (!w.cellTrackOver || w.startResizing) {
        return;
      }

      F.get(params.cell).addCls(GRID_CELL_OVER_CLS);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onCellLeave: function (grid, params) {
      var w = this.widget;

      if (!w.cellTrackOver || w.startResizing) {
        return;
      }

      F.get(params.cell).removeCls(GRID_CELL_OVER_CLS);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onColumnEnter: function (grid, params) {
      var w = this.widget,
        scroller = w.scroller;

      if(w.startResizing){
        return;
      }

      if (!w.columnTrackOver || scroller.bottomKnobDown || scroller.rightKnobDown || params.column.trackOver === false) {
        return;
      }

      F.get(params.columnDom).addCls(GRID_COLUMN_OVER_CLS);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onColumnLeave: function (grid, params) {
      var w = this.widget;

      if(w.startResizing){
        return;
      }

      if (!w.columnTrackOver) {
        return;
      }

      F.get(params.columnDom).removeCls(GRID_COLUMN_OVER_CLS);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onRowEnter: function (grid, params) {
      var w = this.widget,
        scroller = w.scroller;

      if(w.startResizing){
        return;
      }

      if (this.enabled === false) {
        return;
      }

      if (!w.trackOver || scroller.bottomKnobDown || scroller.rightKnobDown) {
        return;
      }

      var rowCells = w.getDomRow(params.rowIndex);

      F.each(rowCells, function (cell) {
        F.get(cell).addCls(GRID_ROW_OVER_CLS);
      });

      w.fire('rowtrackenter', params);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onRowLeave: function (grid, params) {
      var w = this.widget;

      if(w.startResizing){
        return;
      }

      if (this.enabled === false) {
        return;
      }

      if (!w.trackOver) {
        return;
      }

      var rowCells = w.getDomRow(params.rowIndex);

      F.each(rowCells, function (cell) {
        F.get(cell).removeCls(GRID_ROW_OVER_CLS);
      });

      w.fire('rowtrackleave', params);
    },
    /*
     *
     */
    onChangePage: function () {
      if (this.memory) {
        return;
      }

      this.clearSelection();
    },
    /*
     *
     */
    initCellSelection: function () {
      var me = this,
        w = me.widget;

      w.on('cellclick', me.onCellClick, me);

      w.on('cellmousedown', me.onCellMouseDownCells, me);
      w.on('cellenter', me.onCellEnterSelection, me);
    },
    /*
     *
     */
    initRowSelection: function () {
      var me = this,
        w = me.widget;

      if (w.checkboxRowSelection) {
        me.checkboxRow = true;
        setTimeout(function () {
          if (me.selModel === 'rows') {
            me.renderHeaderCheckBox();
          }
        }, 1);
      }

      w.on('rowclick', me.onRowClick, me);

      w.on('cellmousedown', me.onCellMouseDownRows, me);
      w.on('cellclick', me.onCellClickRows, me);
      w.on('rowenter', me.onRowEnterSelection, me);
    },
    /*
     * @param {Object} grid
     * @param {Object} params
     */
    onCellMouseDownRows: function (grid, params) {
      var me = this,
        w = me.widget;

      if (!me.rows || !me.enabled) {
        return;
      }

      if (me.checkOnly && params.column.index !== '$selected') {
        return;
      }

      var e = params.e,
        target = e.target,
        isCTRL = e.ctrlKey;

      var rowIndex = params.rowIndex,
        rowCells = w.getDomRow(rowIndex);

      if (isCTRL && w.multiSelect) {
        if (F.get(rowCells[0]).hasCls(GRID_CELL_SELECTED_CLS)) {
          me.domDeSelectRow(rowIndex);
          if (me.checkboxRow) {
            me.deSelectCheckBox(rowIndex);
          }
        }
        else {
          me.domSelectRow(rowIndex);
          if (me.checkboxRow) {
            me.selectCheckBox(rowIndex);
          }
        }
      }
      else {
        if (params.column.index === '$selected') {
          var checkbox = F.getWidget(F.get(params.cell).select('.' + FIELD_CHECKBOX_CLS).attr('id'));

          if (checkbox.el.within(target)) {
            me.domSelectRow(rowIndex);
            if (checkbox.get() === true) {
              me.domDeSelectRow(rowIndex);
            }
            else {
              me.domSelectRow(rowIndex);
            }
          }
          else {
            me.clearSelection();
            me.domSelectRow(rowIndex);
            if (me.checkboxRow) {
              me.selectCheckBox(rowIndex);
            }
          }
        }
        else {
          me.clearSelection();
          me.domSelectRow(rowIndex);
          if (me.checkboxRow) {
            me.selectCheckBox(rowIndex);
          }
        }
      }

      me.isMouseDown = true;
      me.startRowSelection = rowIndex;

      F.$(document).one('mouseup', function () {
        delete me.isMouseDown;
        delete me.startCellSelection;
      });

      w.fire('select');
    },
    /*
     * @param {Number} rowIndex
     */
    selectCheckBox: function (rowIndex) {
      var me = this,
        w = me.widget,
        checkBoxEls = w.el.select('.' + GRID_COLUMN_SELECT_CLS + ' .' + GRID_CELL_CLS + '[index="' + rowIndex + '"] .' + FIELD_CHECKBOX_CLS);

      checkBoxEls.each(function (item) {
        F.getWidget(item.attr('id')).set(true);
      });

      if (w.selModel === 'rows') {
        me.clearHeaderCheckBox();
      }
      //w.set(rowIndex, '$selected', true);
    },
    /*
     * @param {Number} rowIndex
     */
    deSelectCheckBox: function (rowIndex) {
      var me = this,
        w = me.widget,
        s = w.store,
        checkBoxEls = w.el.select('.' + GRID_COLUMN_SELECT_CLS + ' .' + GRID_CELL_CLS + '[index="' + rowIndex + '"] .' + FIELD_CHECKBOX_CLS),
        id = s.get(rowIndex, 'id');

      if (!id) {
        return;
      }

      if (me.memory) {
        me.memory.except[id] = true;
        delete me.memory.selected[id];
      }

      checkBoxEls.each(function (item) {
        F.getWidget(item.attr('id')).set(false);
      });

      me.clearHeaderCheckBox();
      //w.set(rowIndex, '$selected', true);
    },
    /*
     * @param {Number} rowIndex
     */
    domSelectRow: function (rowIndex) {
      var me = this,
        w = me.widget,
        s = w.store,
        rowCells = w.getDomRow(rowIndex),
        id = s.get(rowIndex, 'id');

      if(w.startResizing){
        return;
      }

      if (me.memory) {
        delete me.memory.except[id];
        me.memory.selected[id] = true;
      }

      F.each(rowCells, function (cell) {
        F.get(cell).addCls(GRID_CELL_SELECTED_CLS);
      });
    },
    /*
     * @param {Number} rowIndex
     */
    domDeSelectRow: function (rowIndex) {
      var w = this.widget,
        rowCells = w.getDomRow(rowIndex);

      F.each(rowCells, function (cell) {
        F.get(cell).removeCls(GRID_CELL_SELECTED_CLS);
      });
    },
    /*
     * @param {Object} grid
     * @param {Object} params
     */
    onColumnEnterSelection: function (grid, params) {
      var me = this,
        w = me.widget;

      if (!me.columns || me.isMouseDown !== true) {
        return;
      }

      var start = {
        columnIndex: me.startColumnColumnIndex,
        side: me.startColumnSide
      };

      var end = {
        columnIndex: params.columnIndex,
        side: params.side
      };

      if (start.side === end.side) {
        switch (start.side) {
          case 'center':
            me.clearSelection('right');
            me.clearSelection('left');
            break;
          case 'left':
            me.clearSelection('center');
            me.clearSelection('right');
            break;
          case 'right':
            me.clearSelection('center');
            me.clearSelection('left');
            break;
        }

        me.selectColumns(start.columnIndex, end.columnIndex, start.side);
      }
      else if (start.side === 'center' && end.side === 'right') {
        me.selectColumns(start.columnIndex, w.columns.length, 'center');
        me.selectColumns(0, end.columnIndex, 'right');
      }
      else if (start.side === 'center' && end.side === 'left') {
        me.selectColumns(0, start.columnIndex, 'center');
        me.selectColumns(end.columnIndex, w.leftColumns.length, 'left');
      }
      else if (start.side === 'left' && end.side === 'center') {
        me.clearSelection('right');
        me.selectColumns(start.columnIndex, w.leftColumns.length, 'left');
        me.selectColumns(0, end.columnIndex, 'center');
      }
      else if (start.side === 'left' && end.side === 'right') {
        me.selectColumns(start.columnIndex, w.leftColumns.length, 'left');
        me.selectColumns(0, w.columns.length, 'center');
        me.selectColumns(0, end.columnIndex, 'right');
      }
      else if (start.side === 'right' && end.side === 'center') {
        me.clearSelection('left');
        me.selectColumns(0, start.columnIndex, 'right');
        me.selectColumns(end.columnIndex, w.columns.length, 'center');
      }
      else if (start.side === 'right' && end.side === 'left') {
        me.selectColumns(0, start.columnIndex, 'right');
        me.selectColumns(0, w.columns.length, 'center');
        me.selectColumns(end.columnIndex, w.leftColumns.length, 'left');
      }
    },
    /*
     * @param {Object} grid
     * @param {Object} params
     */
    onRowEnterSelection: function (grid, params) {
      var me = this,
        w = me.widget;

      if(w.startResizing){
        return;
      }

      if (me.enabled === false) {
        return;
      }

      if (!me.rows || me.isMouseDown !== true) {
        return;
      }

      var rowStart = me.startRowSelection,
        rowEnd = params.rowIndex,
        newSelectedRows = {};

      if (rowStart > rowEnd) {
        rowStart = params.rowIndex;
        rowEnd = me.startRowSelection;
      }

      var i = rowStart,
        iL = rowEnd + 1;

      for (; i < iL; i++) {
        newSelectedRows[i] = true;
      }

      var currentSelected = me.getSelectedRowByColumn(params.columnIndex, params.side),
        toSelect = {},
        toDeselect = {};

      for (var p in newSelectedRows) {
        if (currentSelected[p] !== true) {
          toSelect[p] = true;
        }
      }

      for (var p in currentSelected) {
        if (newSelectedRows[p] !== true) {
          toDeselect[p] = true;
        }
      }

      for (var p in toSelect) {
        me.domSelectRow(p);
        if (me.checkboxRow) {
          me.selectCheckBox(p);
        }
      }

      for (var p in toDeselect) {
        me.domDeSelectRow(p);
        if (me.checkboxRow) {
          me.deSelectCheckBox(p);
        }
      }

      w.fire('select');
    },
    /*
     * @param {Number} columnIndex
     * @param {String} side
     * @return {Object}
     */
    getSelectedRowByColumn: function (columnIndex, side) {
      var w = this.widget,
        body;

      switch (side) {
        case 'left':
          body = w.leftBody;
          break;
        case 'center':
          body = w.body;
          break;
        case 'right':
          body = w.rightBody;
          break;
      }

      var columnEl = body.el.select('.' + GRID_COLUMN_CLS + '[index="' + columnIndex + '"][grid="' + w.id + '"]'),
        selectedCells = columnEl.select('.' + GRID_CELL_SELECTED_CLS),
        selectedRows = {};

      selectedCells.each(function (cell) {
        selectedRows[Number(cell.attr('index'))] = true;
      });

      return selectedRows;
    },
    /*
     * @return {Number}
     */
    getSelectedRow: function () {
      var w = this.widget,
        body = w.body,
        selectedCells = body.el.select('.' + GRID_CELL_SELECTED_CLS);

      if (selectedCells.length === 0) {
        return -1;
      }

      return Number(selectedCells.item(0).attr('index'));
    },
    /*
     * @return {Array}
     */
    getSelectedRows: function () {
      var w = this.widget,
        body = w.body,
        columnEl = body.el.select('.' + GRID_COLUMN_CLS + '[index="0"][grid="' + w.id + '"]'),
        selectedCells = columnEl.select('.' + GRID_CELL_SELECTED_CLS),
        rows = [];

      selectedCells.each(function (cell) {
        rows.push(Number(cell.attr('index')));
      });

      return rows;
    },
    /*
     *
     */
    initColumnSelection: function () {
      var me = this,
        w = me.widget;

      me.selectedColumns = [];

      w.on('columnclick', me.onColumnClick, me);
      w.on('columnmousedown', me.onColumnMouseDown, me);
      w.on('columnenter', me.onColumnEnterSelection, me);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onColumnClick: function (grid, params) {
      var me = this;

      if (!me.column || params.column.selectable === false) {
        return;
      }

      var columnEl = F.get(params.columnDom);

      if (me.column) {
        me.selectedColumns[0] = params;
      }

      me.clearSelection();

      columnEl.addCls(GRID_COLUMN_SELECTED_CLS);
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onRowClick: function (grid, params) {
      var me = this,
        w = me.widget,
        rowIndex = params.rowIndex;

      if (!me.row || params === false) {
        return;
      }

      if (me.checkOnly && params.column.index !== '$selected') {
        return;
      }

      var column = params.column,
        select = true;

      if (column.type === 'action' && column.items) {
        F.each(column.items, function (item) {
          if (item.action === 'remove') {
            select = false;
          }
        });
      }

      me.clearSelection();

      var rowCells = w.getDomRow(rowIndex);

      if (params.column.index === '$selected') {
        var checkbox = F.getWidget(F.get(params.cell).select('.' + FIELD_CHECKBOX_CLS).attr('id'));

        if (checkbox.get() === true) {
          me.selectCheckBox(rowIndex);
          F.each(rowCells, function (cell) {
            F.get(cell).addCls(GRID_CELL_SELECTED_CLS);
          });
        }
        else {
          me.deSelectCheckBox(rowIndex);
        }
      }
      else if (select) {
        F.each(rowCells, function (cell) {
          F.get(cell).addCls(GRID_CELL_SELECTED_CLS);
        });

        me.selectCheckBox(rowIndex);
        w.fire('select');
      }
    },
    /*
     * @param {Object} grid
     * @param {Object} params
     */
    onCellClickRows: function (grid, params) {
      var me = this,
        w = me.widget;

      if (!me.rows || !me.enabled) {
        return;
      }

      if (me.checkOnly && params.column.index !== '$selected') {
        return;
      }

      var e = params.e,
        isCTRL = e.ctrlKey,
        rowIndex = params.rowIndex;

      if (isCTRL && w.multiSelect) {
      }
      else if (params.column.index === '$selected') {
        var checkbox = F.getWidget(F.get(params.cell).select('.' + FIELD_CHECKBOX_CLS).attr('id'));
        if (checkbox.get() === true) {
          me.selectCheckBox(rowIndex);
        }
        else {
          me.deSelectCheckBox(rowIndex);
        }
      }
    },
    /*
     * @param {Number} rowIndex
     */
    selectRow: function (rowIndex) {
      var me = this,
        w = me.widget;

      if(w.startResizing){
        return;
      }

      if (!me.row && !me.rows) {
        throw new Error('[FancyGrid Error] - row selection was not enabled');
      }

      me.clearSelection();

      var rowCells = w.getDomRow(rowIndex);

      F.each(rowCells, function (cell) {
        F.get(cell).addCls(GRID_CELL_SELECTED_CLS);
      });

      w.fire('select');
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onCellClick: function (grid, params) {
      var me = this,
        w = me.widget;

      if (!me.cell) {
        return;
      }

      me.clearSelection();

      F.get(params.cell).addCls(GRID_CELL_SELECTED_CLS);

      w.fire('select');
    },
    /*
     * @param {String} side
     */
    clearSelection: function (side) {
      var me = this,
        w = me.widget;

      if (me.checkboxRow) {
        var selected = w.body.el.select('.' + GRID_COLUMN_CLS + '[index="0"] .' + GRID_CELL_SELECTED_CLS);

        selected.each(function (item) {
          var rowIndex = item.attr('index');

          me.deSelectCheckBox(rowIndex);
        });

        if (me.memory) {
          me.memory.clearAll();
        }
      }

      if (side) {
        switch (side) {
          case 'left':
            w.leftBody.el.select('.' + GRID_CELL_SELECTED_CLS).removeCls(GRID_CELL_SELECTED_CLS);
            w.leftBody.el.select('.' + GRID_COLUMN_SELECTED_CLS).removeCls(GRID_COLUMN_SELECTED_CLS);
            w.leftBody.el.select('.' + GRID_CELL_OVER_CLS).removeCls(GRID_CELL_OVER_CLS);
            break;
          case 'center':
            w.body.el.select('.' + GRID_CELL_SELECTED_CLS).removeCls(GRID_CELL_SELECTED_CLS);
            w.body.el.select('.' + GRID_COLUMN_SELECTED_CLS).removeCls(GRID_COLUMN_SELECTED_CLS);
            w.body.el.select('.' + GRID_CELL_OVER_CLS).removeCls(GRID_CELL_OVER_CLS);
            break;
          case 'right':
            w.rightBody.el.select('.' + GRID_CELL_SELECTED_CLS).removeCls(GRID_CELL_SELECTED_CLS);
            w.rightBody.el.select('.' + GRID_COLUMN_SELECTED_CLS).removeCls(GRID_COLUMN_SELECTED_CLS);
            w.rightBody.el.select('.' + GRID_CELL_OVER_CLS).removeCls(GRID_CELL_OVER_CLS);
            break;
        }
      }
      else {
        w.el.select('.' + GRID_CELL_SELECTED_CLS).removeCls(GRID_CELL_SELECTED_CLS);
        w.el.select('.' + GRID_COLUMN_SELECTED_CLS).removeCls(GRID_COLUMN_SELECTED_CLS);
        w.el.select('.' + GRID_CELL_OVER_CLS).removeCls(GRID_CELL_OVER_CLS);
      }

      w.fire('clearselect');
    },
    /*
     *
     */
    onSort: function () {
      if (this.memory) {
        return;
      }

      this.clearSelection();
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onCellEnterSelection: function (grid, params) {
      var me = this,
        w = me.widget,
        numOfSelectedCells = 0;

      if (!me.cells || me.isMouseDown !== true) {
        return;
      }

      me.prevCellsSelection = params.cell;
      me.prevCellRowIndex = params.rowIndex;
      me.prevCellColumnIndex = params.columnIndex;
      me.prevCellSide = params.side;

      var start = {
        rowIndex: me.startCellRowIndex,
        columnIndex: me.startCellColumnIndex,
        side: me.startCellSide
      };

      var end = {
        rowIndex: params.rowIndex,
        columnIndex: params.columnIndex,
        side: params.side
      };

      if (params.rowIndex < me.startCellRowIndex) {
        start.rowIndex = params.rowIndex;
        end.rowIndex = me.startCellRowIndex;
      }

      if (me.startCellSide === params.side) {
        if (params.columnIndex < me.startCellColumnIndex) {
          start.columnIndex = params.columnIndex;
          end.columnIndex = me.startCellColumnIndex;
        }

        numOfSelectedCells = me.selectCells(start, end, start.side);

        if (me.startCellSide === 'left') {
          me.clearSelection('center');
          me.clearSelection('right');
        }
        else if (me.startCellSide === 'center') {
          me.clearSelection('left');
          me.clearSelection('right');
        }
        else if (me.startCellSide === 'right') {
          me.clearSelection('left');
          me.clearSelection('center');
        }
      }
      else {
        if (me.startCellSide === 'left') {
          numOfSelectedCells = me.selectCells(start, {
            rowIndex: params.rowIndex,
            columnIndex: w.leftColumns.length - 1
          }, 'left');

          if (params.side === 'center') {
            numOfSelectedCells += me.selectCells({
              columnIndex: 0,
              rowIndex: start.rowIndex,
            }, end, 'center');

            me.clearSelection('right');
          }
          else if (params.side === 'right') {
            numOfSelectedCells += me.selectCells({
              columnIndex: 0,
              rowIndex: start.rowIndex
            }, {
              columnIndex: w.columns.length - 1,
              rowIndex: end.rowIndex
            }, 'center');

            numOfSelectedCells += me.selectCells({
              columnIndex: 0,
              rowIndex: start.rowIndex
            }, end, 'right');
          }
        }
        else if (me.startCellSide === 'center') {
          if (params.side === 'left') {
            numOfSelectedCells += me.selectCells({
              columnIndex: 0,
              rowIndex: start.rowIndex
            }, {
              rowIndex: end.rowIndex,
              columnIndex: start.columnIndex
            }, 'center');

            numOfSelectedCells += me.selectCells({
              columnIndex: end.columnIndex,
              rowIndex: start.rowIndex
            }, {
              rowIndex: end.rowIndex,
              columnIndex: w.leftColumns.length - 1
            }, 'left');
          }
          else if (params.side === 'right') {
            numOfSelectedCells += me.selectCells({
              columnIndex: start.columnIndex,
              rowIndex: start.rowIndex
            }, {
              columnIndex: w.columns.length - 1,
              rowIndex: end.rowIndex
            }, 'center');

            numOfSelectedCells += me.selectCells({
              columnIndex: 0,
              rowIndex: start.rowIndex
            }, {
              columnIndex: end.columnIndex,
              rowIndex: end.rowIndex
            }, 'right');
          }
        }
        else if (me.startCellSide === 'right') {
          numOfSelectedCells += me.selectCells({
            columnIndex: 0,
            rowIndex: start.rowIndex
          }, {
            columnIndex: start.columnIndex,
            rowIndex: end.rowIndex
          }, 'right');

          if (params.side === 'center') {
            numOfSelectedCells += me.selectCells({
              columnIndex: end.columnIndex,
              rowIndex: start.rowIndex
            }, {
              columnIndex: w.columns.length - 1,
              rowIndex: end.rowIndex
            }, 'center');
            me.clearSelection('left');
          }
          else if (params.side === 'left') {
            numOfSelectedCells += me.selectCells({
              columnIndex: 0,
              rowIndex: start.rowIndex
            }, {
              columnIndex: w.columns.length - 1,
              rowIndex: end.rowIndex
            }, 'center');

            numOfSelectedCells += me.selectCells({
              columnIndex: end.columnIndex,
              rowIndex: start.rowIndex
            }, {
              columnIndex: w.leftColumns.length - 1,
              rowIndex: end.rowIndex
            }, 'left');
          }
        }
      }

      me.endCellRowIndex = end.rowIndex;

      w.fire('select');
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onColumnMouseDown: function (grid, params) {
      var me = this,
        w = me.widget;

      if (!me.columns || params.column.selectable === false || !me.enabled) {
        return;
      }

      var columnEl = F.get(params.columnDom);

      me.isMouseDown = true;
      me.startColumnColumnIndex = params.columnIndex;
      me.startColumnSide = params.side;

      me.clearSelection();

      columnEl.addCls(GRID_COLUMN_SELECTED_CLS);

      F.$(document).one('mouseup', function () {
        delete me.isMouseDown;
      });


      w.fire('select');
    },
    /*
     * @param {Fancy.Grid} grid
     * @param {Object} params
     */
    onCellMouseDownCells: function (grid, params) {
      var me = this,
        w = me.widget;

      if (w.celledit) {
        w.celledit.hideEditor();
      }

      if (!me.cells || !me.enabled) {
        return;
      }

      var cellEl = F.get(params.cell);

      me.clearSelection();

      cellEl.addCls(GRID_CELL_SELECTED_CLS);
      me.isMouseDown = true;
      me.startCellSelection = params.cell;
      me.startCellRowIndex = params.rowIndex;
      me.startCellColumnIndex = params.columnIndex;
      me.startCellSide = params.side;

      F.$(document).one('mouseup', function () {
        delete me.isMouseDown;
        delete me.startCellSelection;
      });

      w.fire('select');
    },
    /*
     * @param {Number} start
     * @param {Number} end
     * @param {String} side
     */
    selectCells: function (start, end, side) {
      var me = this,
        w = me.widget,
        body = w.body,
        leftBody = w.leftBody,
        rightBody = w.rightBody,
        i = start.rowIndex,
        iL = end.rowIndex + 1,
        b,
        j,
        jL,
        selectedCells = me.getSelectedCells(side || 'center'),
        needToSelect = {},
        toSelect = {},
        toDeselect = {};

      i = start.rowIndex;
      iL = end.rowIndex + 1;
      for (; i < iL; i++) {
        needToSelect[i] = needToSelect[i] || {};
        j = start.columnIndex;
        jL = end.columnIndex + 1;

        for (; j < jL; j++) {
          needToSelect[i][j] = true;
        }
      }

      for (var p in needToSelect) {
        if (selectedCells[p] === undefined) {
          toSelect[p] = needToSelect[p];
        }
        else {
          for (var q in needToSelect[p]) {
            if (selectedCells[p][q] !== true) {
              toSelect[p] = toSelect[p] || {};
              toSelect[p][q] = true;
            }
          }
        }
      }

      for (var p in selectedCells) {
        if (needToSelect[p] === undefined) {
          toDeselect[p] = selectedCells[p];
        }
        else {
          for (var q in selectedCells[p]) {
            if (needToSelect[p][q] !== true) {
              toDeselect[p] = toDeselect[p] || {};
              toDeselect[p][q] = true;
            }
          }
        }
      }

      switch (side) {
        case 'left':
          b = leftBody;
          break;
        case 'center':
          b = body;
          break;
        case 'right':
          b = rightBody;
          break;
        default:
          b = body;
      }

      for (var p in toSelect) {
        for (var q in toSelect[p]) {
          var cell = b.getCell(p, q);

          cell.addCls(GRID_CELL_SELECTED_CLS);
        }
      }

      for (var p in toDeselect) {
        for (var q in toDeselect[p]) {
          var cell = b.getCell(p, q);

          cell.removeCls(GRID_CELL_SELECTED_CLS);
        }
      }
    },
    /*
     * @param {String} side
     * @return {Array}
     */
    getSelectedCells: function (side) {
      var me = this,
        w = me.widget,
        body = w.getBody(side || 'center'),
        selectedCells = body.el.select('.' + GRID_CELL_SELECTED_CLS),
        selected = {},
        i = 0,
        iL = selectedCells.length;

      for (; i < iL; i++) {
        var cell = selectedCells.item(i),
          columnIndex = Number(cell.parent().attr('index')),
          rowIndex = Number(cell.attr('index'));

        selected[rowIndex] = selected[rowIndex] || {};
        selected[rowIndex][columnIndex] = true;
      }

      return selected;
    },
    /*
     * @return {Array}
     */
    getNumberSelectedCells: function () {
      return this.widget.el.select('.' + GRID_CELL_SELECTED_CLS).length;
    },
    /*
     * @param {String} side
     * @return {Array}
     */
    getSelectedColumns: function (side) {
      var w = this.widget,
        body = w.getBody(side),
        selected = {},
        selectedColumns = body.el.select('.' + GRID_COLUMN_SELECTED_CLS),
        i = 0,
        iL = selectedColumns.length;

      for (; i < iL; i++) {
        selected[selectedColumns.item(i).attr('index')] = true;
      }

      return selected;
    },
    /*
     * @param {Number} start
     * @param {Number} end
     * @param {String} side
     */
    selectColumns: function (start, end, side) {
      var me = this,
        selectedColumns = me.getSelectedColumns(side || 'center'),
        needToSelect = {},
        toSelect = {},
        toDeselect = {},
        i = start,
        iL = end;

      if (iL < i) {
        i = end;
        iL = start;
      }

      iL++;
      for (; i < iL; i++) {
        needToSelect[i] = true;
      }

      for (var p in needToSelect) {
        if (selectedColumns[p] !== true) {
          toSelect[p] = true;
        }
      }

      for (var p in selectedColumns) {
        if (needToSelect[p] !== true) {
          toDeselect[p] = true;
        }
      }

      for (var p in toSelect) {
        me.selectColumn(p, side);
      }

      for (var p in toDeselect) {
        me.deselectColumn(p, side);
      }
    },
    /*
     * @param {Object} columnIndex
     * @param {String} side
     */
    selectColumn: function (columnIndex, side) {
      var w = this.widget,
        body = w.getBody(side || 'center'),
        columnEl = F.get(body.getDomColumn(columnIndex));

      columnEl.addCls(GRID_COLUMN_SELECTED_CLS);
    },
    /*
     * @param {Object} columnIndex
     * @param {String} side
     */
    deselectColumn: function (columnIndex, side) {
      var w = this.widget,
        body = w.getBody(side || 'center'),
        columnEl = F.get(body.getDomColumn(columnIndex));

      columnEl.removeCls(GRID_COLUMN_SELECTED_CLS);
    },
    /*
     * @param {Object} returnModel
     * @return {Fancy.Model|Array}
     */
    getSelection: function (returnModel) {
      var me = this,
        w = me.widget,
        s = w.store,
        model = {};

      switch (me.selModel) {
        case 'row':
          model.row = me.getSelectedRow();

          if(model.row !== -1) {
            model.items = [s.get(model.row)];
            model.rows = [model.row];
          }
          else {
            model.items = [];
            model.rows = [];
          }
          break;
        case 'rows':
          model.rows = me.getSelectedRows();
          if (me.memory && me.memory.all) {
            model.items = s.data;
          }
          else {
            model.items = [];
            if(me.memory && !Fancy.Object.isEmpty(me.memory.selected)){
              var selected = me.memory.selected;

              for(var p in selected){
                model.items.push(s.getById(p));
              }
            }
            else {
              var i = 0,
                iL = model.rows.length;

              for (; i < iL; i++) {
                model.items.push(s.get(model.rows[i]));
              }
            }
          }
          break;
        case 'cells':
          break;
        case 'cell':
          break;
        case 'column':
          break;
        case 'columns':
          break;
      }

      if (returnModel) {
        return model;
      }
      return model.items;
    },
    /*
     *
     */
    renderHeaderCheckBox: function () {
      var me = this,
        w = this.widget;

      me._renderHeaderCheckBox(w.leftHeader, w.leftColumns);
      me._renderHeaderCheckBox(w.header, w.columns);
      me._renderHeaderCheckBox(w.rightHeader, w.rightColumns);
    },
    /*
     * @param {Fancy.Header} header
     * @param {Array} columns
     */
    _renderHeaderCheckBox: function (header, columns) {
      var me = this,
        memory = me.memory;

      F.each(columns, function (column, i) {
        if (column.index === '$selected') {
          var headerCellContainer = header.getCell(i).firstChild();

          column.headerCheckBox = new F.CheckBox({
            renderTo: headerCellContainer.dom,
            renderId: true,
            value: false,
            label: false,
            style: {
              padding: '0px',
              display: 'inline-block'
            },
            events: [{
              change: function (checkbox, value) {
                if (value) {
                  me.selectAll();
                  if (memory) {
                    memory.setAll();
                  }
                }
                else {
                  me.deSelectAll();
                  if (memory) {
                    memory.clearAll();
                  }
                }
              }
            }]
          });
        }
      });
    },
    /*
     *
     */
    selectAll: function () {
      var me = this,
        w = me.widget,
        headerCheckBoxEls = w.el.select('.' + GRID_HEADER_CELL_SELECT_CLS + ' .' + FIELD_CHECKBOX_CLS),
        i = 0,
        iL = w.getViewTotal();

      for (; i < iL; i++) {
        var checkBoxEls = w.el.select('.' + GRID_COLUMN_SELECT_CLS + ' .' + GRID_CELL_CLS + '[index="' + i + '"] .' + FIELD_CHECKBOX_CLS),
          j = 0,
          jL = checkBoxEls.length;

        for (; j < jL; j++) {
          var checkBox = F.getWidget(checkBoxEls.item(j).attr('id'));

          checkBox.setValue(true);
        }

        me.domSelectRow(i);
      }

      headerCheckBoxEls.each(function (item) {
        var checkBox = F.getWidget(item.attr('id'));

        checkBox.setValue(true, false);
      });
    },
    /*
     *
     */
    deSelectAll: function () {
      var me = this,
        w = me.widget,
        i = 0,
        iL = w.getViewTotal();

      for (; i < iL; i++) {
        var checkBoxEls = w.el.select('.' + GRID_COLUMN_SELECT_CLS + ' .' + GRID_CELL_CLS + '[index="' + i + '"] .' + FIELD_CHECKBOX_CLS);

        checkBoxEls.each(function (item) {
          var checkBox = F.getWidget(item.attr('id'));

          checkBox.setValue(false);
        });

        me.domDeSelectRow(i);
      }

      me.clearHeaderCheckBox();
    },
    /*
     *
     */
    clearHeaderCheckBox: function () {
      var me = this,
        w = me.widget,
        headerCheckBoxEls = w.el.select('.' + GRID_HEADER_CELL_SELECT_CLS + ' .' + FIELD_CHECKBOX_CLS);

      headerCheckBoxEls.each(function (item) {
        var checkBox = F.getWidget(item.attr('id'));

        checkBox.setValue(false, false);
      });
    },
    stopSelection: function () {
      this.enabled = false;
    },
    enableSelection: function (value) {
      if (value !== undefined) {
        this.enabled = value;
        return;
      }

      this.enabled = true;
    },
    initFixTrackOver: function(){
      var me = this,
        w = me.widget;

      if(w.columns){
        w.body.el.on('mouseleave', me.onBodyMouseLeave, me);
        w.body.el.on('mouseenter', me.onBodyMouseEnter, me);
      }

      if(w.leftColumns){
        w.leftBody.el.on('mouseleave', me.onLeftBodyMouseLeave, me);
        w.leftBody.el.on('mouseenter', me.onLeftBodyMouseEnter, me);
      }

      if(w.rightColumns){
        w.rightBody.el.on('mouseleave', me.onRightBodyMouseLeave, me);
        w.rightBody.el.on('mouseenter', me.onRightBodyMouseEnter, me);
      }
    },
    onBodyMouseLeave: function () {
      var me = this,
        w = me.widget;

      me.clearBodyTrackCls(w.body);
    },
    onBodyMouseEnter: function () {
      var me = this;

      me.rowTrackFixInBody = true;
      setTimeout(function () {
        me.rowTrackFixInBody = false;
      }, 30);
    },
    onLeftBodyMouseLeave: function () {
      var me = this,
        w = me.widget;

      me.clearBodyTrackCls(w.leftBody);
    },
    onLeftBodyMouseEnter: function () {
      var me = this;

      me.rowTrackFixInBody = true;
      setTimeout(function () {
        me.rowTrackFixInBody = false;
      }, 30);
    },
    onRightBodyMouseLeave: function () {
      var me = this,
        w = me.widget;

      me.clearBodyTrackCls(w.rightBody);
    },
    onRightBodyMouseEnter: function () {
      var me = this;

      me.rowTrackFixInBody = true;
      setTimeout(function () {
        me.rowTrackFixInBody = false;
      }, 30);
    },
    clearBodyTrackCls: function (body) {
      var me = this,
        w = me.widget;

      if(w.cellTrackOver){
        body.el.select('.' + GRID_CELL_OVER_CLS).removeCls(GRID_CELL_OVER_CLS);
      }

      if(w.trackOver){
        delete body.prevCellOver;
        if(me.rowTrackFixInterval){
          clearInterval(me.rowTrackFixInterval);
          delete me.rowTrackFixInterval;
        }

        me.rowTrackFixInterval = setTimeout(function () {
          if(!me.rowTrackFixInBody){
            w.el.select('.' + GRID_ROW_OVER_CLS).removeCls(GRID_ROW_OVER_CLS);
          }
        }, 20);
      }
    },
    /*
     *
     */
    onColumnDrag: function () {
      var me = this,
        w = me.widget,
        selectModel;

      if(me.cells || me.cell || me.column || me.columns){
        me.clearSelection();
        return;
      }

      selectModel = me.getSelection(true);

      //reselecting rows
      F.each(selectModel, function (rowIndex) {
        w.selectRow(rowIndex);
      });
    },
    /*
     *
     */
    onColumnLock: function () {
      var me = this,
        w = me.widget,
        selectModel;

      if(me.cells || me.cell || me.column || me.columns){
        me.clearSelection();
        return;
      }

      selectModel = me.getSelection(true);

      //reselecting rows
      F.each(selectModel, function (rowIndex) {
        w.selectRow(rowIndex);
      });
    },
    /*
     *
     */
    onColumnRightLock: function () {
      var me = this,
        w = me.widget,
        selectModel;

      if(me.cells || me.cell || me.column || me.columns){
        me.clearSelection();
        return;
      }

      selectModel = me.getSelection(true);

      //reselecting rows
      F.each(selectModel, function (rowIndex) {
        w.selectRow(rowIndex);
      });
    },
    /*
     *
     */
    onUnColumnLock: function () {
      var me = this,
        w = me.widget,
        selectModel;

      if(me.cells || me.cell || me.column || me.columns){
        me.clearSelection();
        return;
      }

      selectModel = me.getSelection(true);

      //reselecting rows
      F.each(selectModel, function (rowIndex) {
        w.selectRow(rowIndex);
      });
    }
  });

})();