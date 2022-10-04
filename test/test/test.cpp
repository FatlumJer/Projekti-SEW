// test.cpp : This file contains the 'main' function. Program execution begins and ends there.
//
#define _CRT_SECURE_NO_WARNINGS
#include<iostream>  
#include<conio.h>
#include <string>
#include <sstream>
#include <time.h>
#include <stdio.h>
#include <iomanip>
#include <ctime>


#include<mysql_connection.h>
#include <cppconn/driver.h>
#include <cppconn/exception.h>
#include <cppconn/prepared_statement.h>


using namespace std;

void main()
{

    string a = "";
    bool w = true;
    // lidhja me databaze
    sql::Driver* driver;
    sql::Connection* con;
    sql::Statement* stmt;
    sql::PreparedStatement* pstmt;
    sql::ResultSet* res;

    try
    {

        driver = get_driver_instance();
        /* create a database connection using the Driver */
        con = driver->connect("tcp://127.0.0.1:3306", "root", "");
        /* select appropriate database schema */
        con->setSchema("ukz_evidenca");
    }
    catch (sql::SQLException e)
    {
        cout << "Could not connect to server. Error message: " << e.what() << endl;
        system("pause");
        exit(1);
    }

    while (w) {
        
        cin >> a;
        {
            if (a != "") {

                stmt = con->createStatement();
                res = stmt->executeQuery("SELECT * from studentet WHERE id_kartes='" + a + "'");
                while (res->next()) {
                    cout << "id = " << res->getInt(1) << endl;
                    cout << "Emri = " << res->getString("emri") << endl;
                    cout << "Mbiemri = " << res->getString("mbiemri") << endl;
                    cout << "ID e Studentit = " << res->getString("id_studentit") << endl;

                   
                    
                    // nese checkin osht kontrolloje a eshte checkout 
                    // nese checkout osht null edhe checkin osht sot ateher bone checkout
                    // e kunderta nese nuk ka checkin ateher bone checkin 
                    time_t rawtime;
                    struct tm* timeinfo;
                    char buffer[80];

                    time(&rawtime);
                    timeinfo = localtime(&rawtime);

                    strftime(buffer, sizeof(buffer), "%Y-%m-%d", timeinfo);
                    std::string str(buffer);


                    stmt = con->createStatement();
                    res = stmt->executeQuery("SELECT * from evidenca WHERE id_kartes='" + a + "' and koha_hyrje >'" + str + "'");


                    time_t rawtime2;
                    struct tm* timeinfo2;
                    char buffer2[80];

                    time(&rawtime2);
                    timeinfo2 = localtime(&rawtime2);

                    strftime(buffer2, sizeof(buffer2), "%Y-%m-%d %H:%M:%S", timeinfo2);
                    std::string str2(buffer2);



                    if (res->rowsCount() > 0) {
                        //checkin existon perditsoje checkoutin
                        while (res->next()) {

                            cout << "id = " << res->getInt(1) << endl;
                            
                            pstmt = con->prepareStatement("UPDATE `evidenca` SET `koha_dalje`=? WHERE id_kartes='" + a + "'");
                            pstmt->setString(1, str2);
                            pstmt->execute();



                            //update kete id duke e shtuar checkout se bashku me kohen
                        }
                    }
                    else {
                        pstmt = con->prepareStatement("INSERT INTO `evidenca`( `id_kartes`, `koha_hyrje`) VALUES (?,?)");
                        pstmt->setString(1, a);
                        pstmt->setString(2, str2);
                        pstmt->execute();
                        // nuk ka asnje checkin ateher krijoje nje checkin
                    }
                
                }



                // ne web.
                // Ni web aplikacion qe i ka 2 tabela 
                // Tabela userat raport
                // tabela userat = id, numri_kartes, emri, mbiemri, data_lindjes
                // tabela raport = id, numri_kartes, data_ora, erdh_shkoi


                

            }
            
        }
    }

    
}



// Run program: Ctrl + F5 or Debug > Start Without Debugging menu
// Debug program: F5 or Debug > Start Debugging menu

// Tips for Getting Started: 
//   1. Use the Solution Explorer window to add/manage files
//   2. Use the Team Explorer window to connect to source control
//   3. Use the Output window to see build output and other messages
//   4. Use the Error List window to view errors
//   5. Go to Project > Add New Item to create new code files, or Project > Add Existing Item to add existing code files to the project
//   6. In the future, to open this project again, go to File > Open > Project and select the .sln file
