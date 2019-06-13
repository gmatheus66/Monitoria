/*
 *
 * Instituto Federal de Educação, Ciência e Tecnologia - IFPE
 * Curso: Informática para Internet
 * Disciplina: Lógica de Programação e Estrutura de Dados
 * Professor: Allan Lima - allan.lima@igarassu.ifpe.edu.br
 * Monitores:  Matheus Gonçalves, Guilherme Lira
 *
 * Código de Domínio Público, sinta-se livre para usá-lo, modificá-lo e redistribuí-lo.
 *
 */
//importando os modulos
const pug = require('pug');
const express = require('express');
const app =  express();
const path = require('path');
const router =  express.Router();
const url = require('url');

//Compila os arquivos pugs
const CompileEx = pug.compileFile('ex1.pug');

const CompileRan = pug.compileFile('random.pug');

let parts;
let query;

//Define as rotas
app.get('/', function (req,res) {
    res.statusCode = 200; //retorna status da pagina 200 -> ok
    res.setHeader('Content-Type', 'text/html'); //seta o tipo do conteudo
    res.write('Hello World'); //imprimi um html
    res.write("<a style =' display : block;' href=/index> index </a>");
    res.end(); 
      
});

app.get('/index',function (req,res) {
    res.sendFile(path.join(__dirname + '/index.html'));//retorna um arquivo html
});

app.get('/pug', function (req,res){
    res.send(CompileEx({}));//retorna a compilacao do arquivo pug
});

app.get('/random', function (req,res) {
    
    parts = url.parse(req.url, true); //retorna um array com todos os parametros de uma url
    console.log(parts);
    query =  parts.query.random; //retorna uma parte especifica do array, a que tem a informacao que e passada pela url metodo GET 
    console.log(query);
    let n_random = Math.floor(Math.random()*query);//Gerando um array com base no numero que foi passado pela REQ
    console.log(n_random);

    if(n_random > 0){
        //retorna o status da pagina, o arquivo compilado e passa uma varialvel como parametro para o pug
        res.status(200).send(CompileRan({random : `${n_random}`})); 
    }else{
        res.send(CompileRan({}));//retorna o arquivo compilado
    }
})




//Onde o servidor vai ficar escutando
app.listen(8000,() =>{
    console.log('Examplo app -> porta 8000');    
})