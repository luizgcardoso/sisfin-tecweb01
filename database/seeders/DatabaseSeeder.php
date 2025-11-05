<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Estados
        DB::table('estados')->insert([
            ['nome' => 'Paraná', 'desc' => 'Estado da região sul'],
            ['nome' => 'São Paulo', 'desc' => 'Estado da região sudeste']
        ]);

        // Cidades
        DB::table('cidades')->insert([
            ['nome' => 'Umuarama', 'desc' => 'Cidade polo do noroeste', 'idEstado' => 1],
            ['nome' => 'Curitiba', 'desc' => 'Capital do Paraná', 'idEstado' => 1],
            ['nome' => 'São Paulo', 'desc' => 'Capital do estado de SP', 'idEstado' => 2]
        ]);

        // Pessoas
        DB::table('pessoas')->insert([
            [
                'status' => 'ativo',
                'tipoAcesso' => 'membro',
                'inscricao' => '12345678900',
                'nome' => 'Maria Souza',
                'endereco' => 'Rua das Flores, 123',
                'telefone' => '4499999999',
                'email' => 'maria@email.com',
                'sexo' => 'F',
                'dtNasc' => '1995-02-15',
                'obs' => 'Nova membro',
                'idCidade' => 1
            ],
            [
                'status' => 'ativo',
                'tipoAcesso' => 'fornecedor',
                'inscricao' => '98765432100',
                'nome' => 'João da Silva',
                'endereco' => 'Av. Central, 500',
                'telefone' => '11988887777',
                'email' => 'joao@email.com',
                'sexo' => 'M',
                'dtNasc' => '1985-07-10',
                'obs' => null,
                'idCidade' => 3
            ]
        ]);

        // Membros
        DB::table('membros')->insert([
            [
                'idPessoa' => 1,
                'status' => 'ativo',
                'dataCadastro' => '2025-01-01',
                'cargo' => 'Diácono',
                'descricao' => 'Membro ativo na igreja'
            ]
        ]);

        // Fornecedores
        DB::table('fornecedores')->insert([
            [
                'idPessoa' => 2,
                'status' => 'ativo',
                'dataCadastro' => '2025-01-05',
                'descricao' => 'Fornecedor de materiais'
            ]
        ]);

        // Despesas
        DB::table('despesas')->insert([
            [
                'status' => 'pendente',
                'tipoDespesa' => 'fixa',
                'data' => '2025-02-01',
                'dataVenc' => '2025-02-10',
                'valor' => 1500.00,
                'descricao' => 'Aluguel do templo',
                'idFornecedor' => 1
            ]
        ]);

        // Recebimentos
        DB::table('recebimentos')->insert([
            [
                'status' => 'confirmado',
                'tipoRecebimento' => 'dizimo',
                'dataRec' => '2025-02-05',
                'horaRec' => '19:30:00',
                'valor' => 200.00,
                'descricao' => 'Dízimo Maria',
                'mesRef' => '2025-02',
                'formaRecebimento' => 'dinheiro',
                'idMembro' => 1
            ]
        ]);

        // Pagamentos
        DB::table('pagamentos')->insert([
            [
                'status' => 'pago',
                'dataPag' => '2025-02-08',
                'horaPag' => '14:00:00',
                'valor' => 1500.00,
                'descricao' => 'Pagamento aluguel',
                'dataRef' => '2025-02',
                'formaPagamento' => 'transferencia',
                'idDespesa' => 1
            ]
        ]);

        // Itens de Caixa
        DB::table('itens_caixa')->insert([
            [
                'tipoItem' => 'recebimento',
                'data' => '2025-02-05',
                'valor' => 200.00,
                'desc' => 'Entrada de dízimo',
                'idPessoa' => 1
            ]
        ]);

        // Caixa
        DB::table('caixas')->insert([
            [
                'status' => 'aberto',
                'data' => '2025-02-01',
                'hora' => '08:00:00',
                'valorAbertura' => 1000.00,
                'valorTotalPagamentos' => 1500.00,
                'valorTotalRecebimentos' => 2000.00,
                'saldo' => 500.00,
                'idPessoa' => 1
            ]
        ]);
    }
}