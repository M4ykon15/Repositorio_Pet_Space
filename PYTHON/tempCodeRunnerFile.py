import pyodbc

dados_conexao = (
"Driver={SQL Server};"
"Server={Maykon};"
"Database={PET_SPACE};"
)

conexao = pyodbc.connect(dados_conexao)
print("Conexao bem sucedida")

cursor = conexao.cursor()

comando = """INSERT INTO USUARIOS (EMAIL, SENHA) VALUES
('LUCAS@GMAIL.COM', '098765')"""

cursor.execute(comando)
cursor.commit()
