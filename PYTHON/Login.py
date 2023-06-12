import pyodbc

dados_conexao = (
"Driver={SQL Server};"
"Server={Maykon};"
"Database={PET_SPACE};"
)

conexao = pyodbc.connect(dados_conexao)

cursor = conexao.cursor()

apagar = """drop table USUARIOS"""

tabela = """CREATE TABLE USUARIOS (
    ID INT IDENTITY(1,1) PRIMARY KEY,
    EMAIL VARCHAR(255) NOT NULL,
    SENHA VARCHAR(255) NOT NULL
);"""

comando = """INSERT INTO USUARIOS (EMAIL, SENHA) VALUES ('LUCAS@GMAIL.COM', '098765')"""


cursor.execute(apagar)
cursor.execute(tabela)
cursor.execute(comando)
cursor.commit()
