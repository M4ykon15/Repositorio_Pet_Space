from flask import Flask, render_template, request

app = Flask(__name__)

# Rota inicial para exibir o formulário
@app.route('/')
def index():
    return render_template('formulario.html')

# Rota para processar os dados do formulário
@app.route('/processar', methods=['POST'])
def processar():
    # Obter os valores enviados pelo formulário
    nome_pet = request.form['nome_pet']
    sexo = request.form['sexo']
    especie = request.form['especie']
    raca = request.form['raca']
    idade = request.form['idade']
    porte = request.form['porte']
    caracteristicas = ', '.join(request.form.getlist('caracteristicas[]'))
    endereco = request.form['endereco']

    # Aqui você pode realizar qualquer lógica adicional necessária, como armazenar os dados em um banco de dados ou arquivo.

    # Renderizar a página da tabela com os dados do formulário
    return render_template('tabela.html', nome_pet=nome_pet, sexo=sexo, especie=especie, raca=raca, idade=idade, porte=porte, caracteristicas=caracteristicas, endereco=endereco)

if __name__ == '__main__':
    app.run()
