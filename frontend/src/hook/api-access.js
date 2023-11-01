import { api } from '../service/api';

async function getEmployee() {
  return await api.get('/employees');
}

function getEmployeeById(id) {
  return api.get(`/employees/id?id=${id}`);
}

function insertEmployee(employee) {
  return api.post('/employees', employee);
}

function deleteEmployee(id) {
  return api.delete(`/employees?id=${id}`);
}

function updateEmployee(employee, id) {
  return api.put(`/employees?id=${id}`, employee);
}

async function getOffice() {
  return await api.get('/offices');
}

function getOfficeById(id) {
  return api.get(`/offices/id?id=${id}`);
}

function insertOffice(office) {
  return api.post('/offices', office);
}

function deleteOffice(id) {
  return api.delete(`/offices?id=${id}`);
}

function updateOffice(office, id) {
  return api.put(`/offices?id=${id}`, office);
}

export {
  deleteEmployee,
  deleteOffice,
  getEmployee,
  getEmployeeById,
  getOffice,
  getOfficeById,
  insertEmployee,
  insertOffice,
  updateEmployee,
  updateOffice,
};
