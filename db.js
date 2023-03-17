const mysql=require('mysql');

const DatabaseConnectionConfig={host:"localhost", user:"root", password:"", database:"weather"}

const con=mysql.createConnection(DatabaseConnectionConfig);

con.connect(function (error) {
    if(error){
        console.log("Connection Fail")
    }
    else{
        console.log("Connection Success");
        //InsertData(con);
        //DeleteDataByID(con)
       //UpdateData(con);



    }
});

exports.db_con=con