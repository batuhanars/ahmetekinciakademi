<style>
    html,
    body {
        padding: 0;
        margin: 0;
    }
</style>
<div
    style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
        <tbody>
            <tr>
                <td align="center" valign="center" style="text-align:center; padding: 40px">
                    <a href="../../demo13/dist/index.html" class="mb-12">
                        <img alt="Logo" src="{{ asset('assets/back/ahmetekinci-siyah.png') }}" width="300" />
                    </a>
                </td>
            </tr>
            <tr>
                <td align="left" valign="center">
                    <div
                        style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
                        <!--begin:Email content-->
                        <div style="padding-bottom: 30px; font-size: 17px;">
                            <strong>Merhaba! {{ $user->fullname }}</strong>
                        </div>
                        <div style="padding-bottom: 30px">Bu e-postayı, hesabınız için bir parola yenileme isteği
                            gönderdiğiniz için alıyorsunuz. Parola sıfırlama işlemine devam etmek için lütfen aşağıdaki
                            düğmeyi tıklayın:</div>
                        <div style="padding-bottom: 40px; text-align:center;">
                            <a href="{{ route('change-password', ['token' => $token, 'email' => $user->email]) }}"
                                rel="noopener"
                                style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#009EF7;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle"
                                target="_blank">Parola Yenile</a>
                        </div>
                        <div style="padding-bottom: 30px">Bu parola sıfırlama bağlantısının süresi 60 dakika içinde
                            dolacak. Parola sıfırlama talebinde bulunmadıysanız, başka bir işlem yapmanız gerekmez.
                        </div>
                        <div style="border-bottom: 1px solid #eeeeee; margin: 15px 0"></div>
                        <div style="padding-bottom: 50px; word-wrap: break-all;">
                            <p style="margin-bottom: 10px;">
                                Buton çalışmıyor mu? Bu URL'yi tarayıcınıza yapıştırmayı deneyin:
                            </p>
                            <a href="{{ route('change-password', ['token' => $token, 'email' => $user->email]) }}"
                                rel="noopener" target="_blank"
                                style="text-decoration:none;color: #009EF7">{{ route('change-password', ['token' => $token, 'email' => $user->email]) }}</a>
                        </div>
                        <!--end:Email content-->
                    </div>
                </td>
            <tr>
                <td align="center" valign="center"
                    style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
                    <p>Copyright ©
                        <a href="{{ route('panel.index') }}" rel="noopener" target="_blank">ahmetekinciakademi.com</a>.
                    </p>
                </td>
            </tr>
        </tbody>    
    </table>
</div>
