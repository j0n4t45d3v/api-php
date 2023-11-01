import { useState } from 'react';
import { Report } from './components/Report';
import { FormEmployee } from './components/formEmployee';
import { FormEmployeeDelete } from './components/formEmployeeDelete';
import { FormOffice } from './components/formOffice';
import { FormOfficeDelete } from './components/formOfficeDelete';
import { getEmployeeById } from './hook/api-access';

function App() {
  const [idEmployee, setIdEmployee] = useState(0);
  const [employee, setEmployee] = useState({
    name: '',
    lastname: '',
    office: 0,
    birthdate: '',
    salary: null,
  });
  const [employeeRegister, setEmployeeRegister] = useState(false);
  const [employeeDelete, setEmployeeDelete] = useState(false);
  const [employeeUpdate, setEmployeeUpdate] = useState(false);
  const [officeRegister, setOfficeRegister] = useState(false);
  const [officeDelete, setOfficeDelete] = useState(false);
  const [report, setReport] = useState(false);

  function handleAddEmployee() {
    cleanForm();
    setEmployeeRegister(!employeeRegister);
  }

  function handleRemoveEmployee() {
    cleanForm();
    setEmployeeDelete(!employeeDelete);
  }

  function handleRemoveOffice() {
    cleanForm();
    setOfficeDelete(!officeDelete);
  }

  async function handleUpdateEmployee() {
    cleanForm();
    let idEmployeeInput = Number(prompt('Digite o id do funcionario: '));
    setIdEmployee(idEmployeeInput);
    try {
      const employee = await getEmployeeById(idEmployeeInput);

      setEmployee(employee.data.employee);
      setEmployeeUpdate(!employeeUpdate);
    } catch (error) {
      alert(error.response.data.error);
    }
  }

  function handleAddOffice() {
    cleanForm();
    setOfficeRegister(!officeRegister);
  }

  function cleanForm() {
    setEmployeeRegister(false);
    setOfficeRegister(false);
    setEmployeeDelete(false);
    setEmployeeUpdate(false);
    setReport(false);
    setOfficeDelete(false);
  }

  async function handlerReport() {
    cleanForm();
    setReport(!report);
  }

  return (
    <>
    <div style={{margin: 10}}>
    <button onClick={handleAddEmployee}>Cadastrar Funcionario</button>
      <button onClick={handleAddOffice}>Cadastrar Cargo</button>
      <button onClick={handleRemoveOffice}>Remover Cargo</button>
      <button onClick={handleUpdateEmployee}>
        Alterar dados do funcinario
      </button>
      <button onClick={handleRemoveEmployee}>Deletar funcionario</button>
      <button onClick={handlerReport}>gerar relatorio</button>
    </div>
      {employeeRegister && <FormEmployee updateOrRegister={true} />}
      {employeeUpdate && (
        <FormEmployee
          idProp={idEmployee}
          updateOrRegister={false}
          nameProp={employee.name}
          lastnameProp={employee.lastname}
          officeProp={employee.office}
          birthdateProp={employee.birthdate}
          salaryProp={employee.salary}
        />
      )}
      {officeRegister && <FormOffice />}
      {officeRegister && <FormOffice />}
      {officeDelete && <FormOfficeDelete />}
      {employeeDelete && <FormEmployeeDelete />}
      {report && <Report />}
    </>
  );
}

export default App;
