$("#form_Impfpatient").validate({
rules: {
	id: {
	},
	c_ts: {
		string: true
	},
	m_ts: {
		string: true
	},
	identifier: {
		string: true,
		maxlength: 50
	},
	created_id: {
		string: true
	},
	modified_id: {
		string: true
	},
	owner_id: {
		string: true
	},
	Nachname: {
		string: true,
		maxlength: 50
	},
	Vorname: {
		string: true,
		maxlength: 50
	},
	Geburtsdatum: {
		string: true
	},
	Emailadresse: {
		string: true,
		maxlength: 50
	},
	Telefonnummer: {
		float: true,
		float: true
	},
	Adresse: {
	},
	Adresse_Nachname: {
		string: true,
		maxlength: 50
	},
	Adresse_Vorname: {
		string: true,
		maxlength: 50
	},
	Adresse_Straße: {
		string: true,
		maxlength: 50
	},
	Adresse_Hausnummer: {
		float: true,
		float: true
	},
	Adresse_PLZ: {
		integer: true,
		digits: true,
		maxlength: 5
	},
	Adresse_Ort: {
		string: true,
		maxlength: 50
	}
}
});
