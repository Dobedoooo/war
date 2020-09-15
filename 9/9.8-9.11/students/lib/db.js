const mysql = require('mysql');
const {db} = require('../config.json');

class Db {

    // 构造函数
    constructor(table) {

        this.table = table;

        this.__init();

    }

    __init() {

        let {host, user, password, database, port} = db;

        this.connection = mysql.createConnection({
            host: host,
            user: user,
            password: password,
            database: database,
            port: port
        });

        this.connection.connect();

    }

    update({id, name, age, gender, major, classes}) {

        return new Promise((resolve, reject) => {

            this.connection.query('UPDATE ' + this.table + ' SET `name` = ?, age = ?, gender = ?, major = ?, class = ? WHERE id = ?', [name, age, gender, major, classes, id], (error, results) => {

                if(error) {
                    
                    reject(error);

                } 

                if(results.affectedRows) {

                    resolve();

                } else {

                    reject(error);

                }

            })

        })

    }

}

module.exports = {
    Db: Db
}