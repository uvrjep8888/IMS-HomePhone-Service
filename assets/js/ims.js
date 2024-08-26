$(document).ready(function () {
	$.ajax({
		url: base_url + "/ims/subscribers",
		// data: {
		// 	event: event,
		// 	addons: addons,
		// 	// date:date
		// },
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
						</div>

						<div class="form-layer">
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
			alert("Error");
		}

		if (phoneNumber == "") {
			alert("Error");
		}

		$.ajax({
			url: base_url + "/ims/subscriber/" + phoneNumber,

			dataType: "json",
			success: function (data) {
				console.log(data);
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
							</div>

							<div class="form-layer">
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
							</div>
						</div>`;
				$("#data").append(html);
			},
			error: function (data) {
				alert("error");
			},
			method: "GET",
		});
	});
});
