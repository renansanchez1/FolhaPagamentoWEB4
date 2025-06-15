-- Tabela funcionários
CREATE TABLE public.funcionarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    salario NUMERIC(10,2) NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Tabela contas a pagar
CREATE TABLE public.contas_pagar (
    id SERIAL PRIMARY KEY,
    funcionario_id INTEGER REFERENCES public.funcionarios(id) ON DELETE CASCADE,
    descricao VARCHAR(255),
    valor NUMERIC(10,2),
    data_vencimento DATE,
    status VARCHAR(50),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Tabela ocorrências
CREATE TABLE public.ocorrencias (
    id SERIAL PRIMARY KEY,
    funcionario_id INTEGER REFERENCES public.funcionarios(id) ON DELETE CASCADE,
    descricao VARCHAR(255),
    tipo VARCHAR(50),
    valor NUMERIC(10,2),
    data DATE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Tabela folha de pagamento
CREATE TABLE public.folha_pagamentos (
    id SERIAL PRIMARY KEY,
    competencia VARCHAR(7) NOT NULL, -- formato YYYY-MM
    data_geracao TIMESTAMP NOT NULL,
    valor_total NUMERIC(10,2),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Tabela folha_funcionario (salários e cálculo detalhado por funcionário)
CREATE TABLE public.folha_funcionario (
    id SERIAL PRIMARY KEY,
    folha_pagamento_id INTEGER REFERENCES public.folha_pagamentos(id) ON DELETE CASCADE,
    funcionario_id INTEGER REFERENCES public.funcionarios(id) ON DELETE CASCADE,
    salario_base NUMERIC(10,2),
    adicionais NUMERIC(10,2),
    descontos NUMERIC(10,2),
    contas_pagar NUMERIC(10,2),
    salario_liquido NUMERIC(10,2),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

-- Tabela pivô ocorrencia_folha_pagamento (relacionamento many-to-many ocorrencias x folha)
CREATE TABLE public.ocorrencia_folha_pagamento (
    id SERIAL PRIMARY KEY,
    folha_pagamento_id INTEGER REFERENCES public.folha_pagamentos(id) ON DELETE CASCADE,
    ocorrencia_id INTEGER REFERENCES public.ocorrencias(id) ON DELETE CASCADE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
