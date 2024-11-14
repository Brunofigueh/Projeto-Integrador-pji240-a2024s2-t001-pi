pip install pandas as pd 



from faker import Faker
import mysql.connector

# Configurações do banco de dados
config = {
    'user': 'hov9byvj7u6tdy6x',
    'password': 'yd785ippneanbe8w',
    'host': 'mysql://hov9byvj7u6tdy6x:yd785ippneanbe8w@izm96dhhnwr2ieg0.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/mrrrh8fsanxe85db',
    'database': 'mrrrh8fsanxe85db',
}

# Conexão com o banco de dados
conn = mysql.connector.connect(**config)
cursor = conn.cursor()

# Inicializa o Faker com localização brasileira
fake = Faker('pt_BR')

# Função para inserir dados fictícios
def gerar_dados_ficticios(qtd):
    for _ in range(qtd):
        nome = fake.name()
        email = fake.email()
        cep = fake.postcode()
        rua = fake.street_name()
        bairro = fake.bairro()
        cidade = fake.city()
        uf = fake.estado_sigla()
        municipio = fake.city()
        descricao = fake.text(max_nb_chars=200)

        sql = """
        INSERT INTO teste (ID_CHAMADOS, NOME, EMAIL, CEP, RUA, BAIRRO, CIDADE, UF, MUNICIPIO, DESCRICAO)
        VALUES (NULL, %s, %s, %s, %s, %s, %s, %s, %s, %s)
        """
        val = (nome, email, cep, rua, bairro, cidade, uf, municipio, descricao)
        cursor.execute(sql, val)
        conn.commit()

# Gera 100 linhas de dados fictícios
gerar_dados_ficticios(100)

# Fecha a conexão com o banco de dados
cursor.close()
conn.close()
