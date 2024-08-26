$(document).ready(function () {
	$.ajax({
		url: base_url + "/ims/subscribers",

		dataType: "json",
		success: function (data) {
			const html = data.map((data, index) => {
				return `<div class="form-container">
						<div class="form-layer">
							<div class="form-group">
								<label for="phoneNumber">Phone Number:</label>
								<input
									type="text"
									id="phoneNumber"
									name="phoneNumber"
									class="form-input"
									value=${data.phoneNumber}
									disabled = true
								/>
							</div>
							<div class="form-group">
								<label for="username">Username:</label>
								<input
									type="text"
									id="username"
									name="username"
									class="form-input"
									value = ${data.username}
								/>
							</div>
							<div class="form-group">
								<label for="domain">Domain:</label>
								<input
									type="text"
									id="domain"
									name="domain"
									class="form-input"
									value = ${data.domain}
								/>
							</div>
						</div>

						<div class="form-layer">
							
							<div class="form-group">
								<label for="status">Status:</label>
								<input
									type="checkbox"
									id="status"
									name="status"
									class="form-checkbox"
									${data.status == 1 && "checked"}
								/>
							</div>
							<div class="form-group">
								<label for="provisioned">Provisioned:</label>
								<input
									type="checkbox"
									id="provisioned"
									name="provisioned"
									class="form-checkbox"
									${data.callForwardProvisioned == 1 && "checked"}
								/>
							</div>
							<div class="form-group">
								<label for="destination">Destination:</label>
								<input
									type="text"
									id="destination"
									name="destination"
									class="form-input"
									value = ${data.callForwardDestination}
								/>
							</div>
							<div>
								<button class = "btn btn-success" id="update" data-id = ${
									data.phoneNumber
								}>Update</button>
								<button class = "btn btn-danger" id="delete" data-id = ${
									data.phoneNumber
								}>Delete</button>
							</div>
						</div>
					</div>`;
			});

			$("#data").append(html);
		},
		error: function (data) {
			alert("error");
		},
		method: "GET",
	});

	$(".search-button").click(function () {
		const phoneNumber = $(".search-input").val();
		if (isNaN(Number(phoneNumber))) {
			alert("Please enter a valid Phone number");
		}

		if (phoneNumber == "") {
			alert(
				"This field cannot be left blank. Please provide the required information."
			);
			location.reload();
		}

		$.ajax({
			url: base_url + "/ims/subscriber/" + phoneNumber,

			dataType: "json",
			success: function (data) {
				$("#data").html("");
				const html = `<div class="form-container">
							<div class="form-layer">
								<div class="form-group">
									<label for="phoneNumber">Phone Number:</label>
									<input
										type="text"
										id="phoneNumber"
										name="phoneNumber"
										class="form-input"
										value=${data.phoneNumber}
										disabled = true
									/>
								</div>
								<div class="form-group">
									<label for="username">Username:</label>
									<input
										type="text"
										id="username"
										name="username"
										class="form-input"
										value = ${data.username}
									/>
								</div>
								<div class="form-group">
									<label for="domain">Domain:</label>
									<input
										type="text"
										id="domain"
										name="domain"
										class="form-input"
										value = ${data.domain}
									/>
								</div>
							</div>

							<div class="form-layer">
								
								<div class="form-group">
									<label for="status">Status:</label>
									<input
										type="checkbox"
										id="status"
										name="status"
										class="form-checkbox" 
										${data.status == 1 && "checked"}
									/>
								</div>
								<div class="form-group">
									<label for="provisioned">Provisioned:</label>
									<input
										type="checkbox"
										id="provisioned"
										name="provisioned"
										class="form-checkbox"
										${data.features.callForwardNoReply.provisioned == "active" && "checked"}
									/>
								</div>
								<div class="form-group">
									<label for="destination">Destination:</label>
									<input
										type="text"
										id="destination"
										name="destination"
										class="form-input"
										value = ${data.features.callForwardNoReply.destination}
									/>
								</div>
								<div>
									<button class = "btn btn-success" id="update" data-id = ${
										data.phoneNumber
									}>Update</button>
									<button class = "btn btn-danger" id="delete" data-id = ${
										data.phoneNumber
									}>Delete</button>
								</div>
							</div>
						</div>`;
				$("#data").append(html);
			},
			error: function (data) {
				$("#data").html("");
				const html = `<div class="form-container">
							No Record Found! 
						</div>`;
				$("#data").append(html);
			},
			method: "GET",
		});
	});

	$(document).on("click", "#update", function () {
		$.ajax({
			url:
				base_url +
				"ims/subscriber/" +
				$(this).closest(".form-container").find("#phoneNumber").val(),
			method: "PUT",
			data: {
				phoneNumber: $(this)
					.closest(".form-container")
					.find("#phoneNumber")
					.val(),
				username: $(this).closest(".form-container").find("#username").val(),
				password: "asd",
				domain: $(this).closest(".form-container").find("#domain").val(),
				status:
					$(this).closest(".form-container").find("#status:checked").val() ==
					"on"
						? 1
						: 0,
				provisioned:
					$(this)
						.closest(".form-container")
						.find("#provisioned:checked")
						.val() == "on"
						? 1
						: 0,
				destination: $(this)
					.closest(".form-container")
					.find("#destination")
					.val(),
			},
			dataType: "json",
			success: function (data) {
				alert("Success");
			},
			error: function (data) {
				alert("error : ", data);
			},
		});
	});

	$(document).on("click", "#delete", function () {
		$.ajax({
			url:
				base_url +
				"ims/subscriber/" +
				$(this).closest(".form-container").find("#phoneNumber").val(),
			method: "DELETE",
			dataType: "json",
			success: function (data) {
				location.reload();
			},
			error: function (data) {
				alert("error : ", data);
			},
		});
	});
});
