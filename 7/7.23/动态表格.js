

var Table = function(btn, container, pos, tableStyle = '', cellStyle = '') {
    this.btn = btn;
    this.container = container;
    this.pos = pos;
    this.tbs = [];
    // 创建表格
    this.createTable();
    this.tableStyle = tableStyle;
    this.cellStyle = cellStyle;
}

Table.prototype = {
    // 为table设置样式
    _add_style_for_table(tb, style) {
        if(style != '') {
            tb.style.cssText = 'margin: 50px auto 0;' + style;
        } else {
            tb.style.cssText = `
                border-collapse: collapse;
                margin: 50px auto 0;
                text-align: center;
            `;
        }
    },
    // 为td设置样式
    _add_style_for_cell(td, style) {
        if(style != '') {
            td.style.cssText = style;
        } else {
            td.style.cssText = `
                width: 100px;
                height: 20px;
                border: 1px solid #333;
            `;
        }
    },
    // 删除按钮
    _addDeleteBtn(tr) {
        var deleteBtn = document.createElement('td');
        deleteBtn.innerHTML = '❌';
        deleteBtn.style.cssText = `
            border: none;
            width: 20px;
            cursor: pointer;
        `;
        deleteBtn.onclick = function() {
            tr.parentElement.removeChild(this.parentElement);
        }
        tr.appendChild(deleteBtn);
    },
    // 添加按钮
    _addRowBtn(currentTable) {
        var that = this;
        var btn = document.createElement('div');
        var colNum = currentTable.lastElementChild.firstElementChild.childElementCount;
        btn.innerHTML = '+';
        btn.style.cssText = `
            margin: 0 auto;
            width: 50px;
            height: 20px;
            border: 1px solid #333;
            border-top: none;
            cursor: pointer;
            text-align: center;
        `;
        // console.log(col);
        btn.onclick = function() {
            // 表格添加行 HTMLTableElement.isnertRow()
            // 行内添加单元格 HTMLTableRowElement.insertCell()
            var tr = currentTable.insertRow();
            for(var i = 0; i < colNum - 1; i++) {
                var td = tr.insertCell();
                that._add_style_for_cell(td, that.cellStyle);
            }
            that._addDeleteBtn(tr);
        }
        this.container.insertBefore(btn, this.pos);
    },
    createTable() {
        var that = this;
        this.btn.onclick = function() {
            var table = document.createElement('table');
            that._add_style_for_table(table, that.tableStyle);
            var thead = document.createElement('thead');
            thead.style.fontWeight = 'bold';
            var tbody = document.createElement('tbody');
            var size = prompt('请输入表格尺寸，用 空格 隔开');
            var row = size.split(' ')[0];
            var col = size.split(' ')[1];
            // console.log(row, col);
            // 创建 thead
            var head_tr = thead.insertRow();
            for(var k = 0; k < col; k++) {
                var td = head_tr.insertCell();
                that._add_style_for_cell(td, that.cellStyle);
                td.innerHTML = k==0?'#':'';
            }
            // 创建 tbody
            for(var i = 0; i < row; i++) {
                var tr = tbody.insertRow();
                for(var j = 0; j < col; j++) {
                    var td = tr.insertCell();
                    that._add_style_for_cell(td, that.cellStyle);
                }
                that._addDeleteBtn(tr);
            }
            table.appendChild(thead);
            table.appendChild(tbody);
            that._put(table);
            that._editable(table);
            // that.tbs.push(table);
            // document.body.insertBefore(table, that.btn);
            // console.log(that.tbs);
        }
    },
    // 放入容器
    _put(currentTable, col) {
        this.container.insertBefore(currentTable, this.pos);
        this._addRowBtn(currentTable, col);
    },
    // 可编辑
    _editable(table) {
        table.ondblclick = function(ev) {
            ev.target.setAttribute('contenteditable', true);
            ev.target.focus();
            ev.target.onblur = function() {
                this.removeAttribute('contenteditable');
            }
        }
    }

}