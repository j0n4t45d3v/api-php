import { useRef } from "react";
import { insertOffice } from "../../hook/api-access";

export function FormOffice() {
  const descriptionRef = useRef('');

  async function handleAddOffice() {
    const description = descriptionRef.current.value;

    const office = {
      description
    };

    try {
      await insertOffice(office);
      alert('Cargo cadastrado com sucesso!');
    } catch (error) {
      alert(error.response.data.error);
    }

  }

  return (
    <div className="container-form">
      <h1>Formulario de Cadastro de Cargo</h1>

      <input ref={descriptionRef} type="text" placeholder="descrição" />
      <button onClick={handleAddOffice}>Cadastrar</button>
    </div>
  );
}
